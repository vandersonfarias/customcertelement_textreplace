<?php
// This file is part of the customcert module for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file contains the customcert element text's core interaction API.
 *
 * @package    customcertelement_textreplace
 * @copyright  2013 Mark Nelson <markn@moodle.com>  
 * @author     2025 Vanderson Farias <vanderson2005@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace customcertelement_textreplace;

/**
 * The customcert element text's core interaction API.
 *
 * @package    customcertelement_textreplace
 * @copyright  2013 Mark Nelson <markn@moodle.com>  
 * @author     2025 Vanderson Farias <vanderson2005@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class element extends \mod_customcert\element
{

    /**
     * This function renders the form elements when adding a customcert element.
     *
     * @param \MoodleQuickForm $mform the edit_form instance
     */
    public function render_form_elements($mform)
    {
        $mform->addElement('textarea', 'text', get_string('text', 'customcertelement_text'));
        $mform->setType('text', PARAM_RAW);
        $mform->addHelpButton('text', 'text', 'customcertelement_text');

        parent::render_form_elements($mform);
    }

    /**
     * This will handle how form data will be saved into the data column in the
     * customcert_elements table.
     *
     * @param \stdClass $data the form data
     * @return string the text
     */
    public function save_unique_data($data)
    {
        return $data->text;
    }

    /**
     * 
     * Function to replace variables in the text with user data.
     * 
     */

    function get_customcoursefield_value(array $customfields, string $shortname)
    {
        foreach ($customfields as $data_controller) {
            $field = $data_controller->get_field();
            if ($field->get('shortname') === $shortname) {
                return $data_controller->get_value();
            }
        }
        return null;
    }

    public function replace_text($text, $user, $context = [])
    {
        $replacer = function ($matches) use ($context, $user) {
            list($full, $table, $field, $fallback) = $matches + [null, null, null, ''];
            $value = '';

            //Recovery courseid
            $courseid = \mod_customcert\element_helper::get_courseid($this->id);
            $course = get_course($courseid);
            $customcourse = new \core_course_list_element($course);
            $customcourse = $customcourse->get_custom_fields();
              switch ($table) {
                case 'user':
                    $value = $user->$field ?? ($user->profile[$field] ?? '');
                    break;

                case 'course':
                    $value = $course->$field ?? ($this->get_customcoursefield_value($customcourse, $field) ?? '');
                    break;

                default:
                     if (isset($context[$table]) && is_object($context[$table])) {
                        $obj = $context[$table];
                        $value = $obj->$field ?? '';
                    }
                    break;
            }

            return ($value !== '') ? $value : $fallback;
        };
          $pattern = '/\{([a-zA-Z0-9_]+):([a-zA-Z0-9_]+)(?:\|([^}]*))?\}/';

        return preg_replace_callback($pattern, $replacer, $text);
    }


    /**
     * Handles rendering the element on the pdf.
     *
     * @param \pdf $pdf the pdf object
     * @param bool $preview true if it is a preview, false otherwise
     * @param \stdClass $user the user we are rendering this for
     */
    public function render($pdf, $preview, $user)
    {
        \mod_customcert\element_helper::render_content($pdf, $this, $this->replace_text($this->get_text(), $user));
    }

    /**
     * Render the element in html.
     *
     * This function is used to render the element when we are using the
     * drag and drop interface to position it.
     *
     * @return string the html
     */
    public function render_html()
    {
        global $USER;


        return \mod_customcert\element_helper::render_html_content($this, $this->replace_text($this->get_text(), $USER));
    }

    /**
     * Sets the data on the form when editing an element.
     *
     * @param \MoodleQuickForm $mform the edit_form instance
     */
    public function definition_after_data($mform)
    {
        if (!empty($this->get_data())) {
            $element = $mform->getElement('text');
            $element->setValue($this->get_data());
        }
        parent::definition_after_data($mform);
    }

    /**
     * Helper function that returns the text.
     *
     * @return string
     */
    protected function get_text(): string
    {
        $context = \mod_customcert\element_helper::get_context($this->get_id());
        return format_text($this->get_data(), FORMAT_HTML, ['context' => $context]);
    }
}
