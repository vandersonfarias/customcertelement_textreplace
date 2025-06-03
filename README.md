**CustomCertElement TextReplace** is a plugin for Moodle that enables dynamic text replacement in custom certificates using placeholders with automatic or custom values. It is ideal for institutions that need to adjust certificate content in a flexible and automated way.

---

## 📝 Description

This plugin is an extension of Moodle's Custom Certificate, adding a new element that allows replacing default texts or variables with new values during certificate generation. This way, administrators and teachers can create even more personalized certificates for their courses.

---

## 🚀 Features

* Automatic replacement of defined texts or placeholders
* Use of standard variables and custom fields from users and courses
* Support for creating new custom variables
* Native integration with the Custom Certificate plugin
* Simple configuration directly through the certificate's admin interface
* Compatible with multiple Moodle versions

---

## 🧩 Using Variables

The plugin supports variables in the format `{context:identifier}`, which are automatically replaced with the corresponding value during certificate generation.

**Examples:**
**User:**

* `{user:lastname}` → user's last name
* `{user:custom_field_identifier}` → value of a user's custom profile field

**Course:**

* `{course:fullname}` → course full name
* `{course:custom_field_identifier}` → value of a course's custom field

This feature offers great flexibility for customizing certificates according to specific information from each user and course.

---

## 🔧 Installation

Clone or download the repository:

```bash
git clone https://github.com/vandersonfarias/moodle-customcertelement_textreplace.git
```

Copy the plugin folder into the Custom Certificate element directory in Moodle:

```bash
[moodle]/mod/customcert/element/
```

Access the Moodle admin interface and follow the instructions to complete the plugin installation.

Add the Text Replace element to your custom certificate and configure it as needed.

---

## ⚙️ Configuration

* When creating or editing a certificate, add the **Text Replace** element.
* Define the texts or placeholders to be replaced and their corresponding values.
* Save the certificate and preview the applied replacements in the generated certificate.

---

## ✅ Requirements

* Moodle with the **Custom Certificate** plugin installed and configured
* Admin access or appropriate permissions to install plugins

---

## 📄 License

This project is licensed under the **GNU GPL v3**.

---

## 🙋‍♂️ Contributions

Contributions are welcome! Feel free to open issues or submit pull requests with improvements, fixes, or suggestions.

---

## 📫 Contact

Developed by **Vanderson Farias**.
For questions or suggestions, reach out via GitHub.

------------

Portuguese



CustomCertElement TextReplace é um plugin para o Moodle que permite realizar substituições dinâmicas de texto em certificados personalizados, utilizando placeholders com valores automáticos ou personalizados. Ideal para instituições que necessitam ajustar o conteúdo dos certificados de forma flexível e automatizada.

📝 Descrição
Este plugin é uma extensão do Custom Certificate do Moodle, adicionando um novo elemento que permite substituir variáveis ou textos padrões por novos valores no momento da geração do certificado. Assim, administradores e professores podem criar certificados ainda mais personalizados para seus cursos.

🚀 Funcionalidades
Substituição automática de textos ou placeholders definidos.

Uso de variáveis padrão e campos personalizados do usuário e do curso.

Suporte à criação de novas variáveis personalizadas.

Integração nativa com o plugin Custom Certificate.

Configuração simples diretamente pela interface de administração do certificado.

Compatível com múltiplas versões do Moodle.

🧩 Uso de Variáveis
O plugin permite o uso de variáveis no formato {contexto:identificador}, que são substituídas automaticamente pelo valor correspondente no momento da geração do certificado.

Exemplos:
Usuário:

{user:lastname} → sobrenome do usuário.

{user:identificador_campo_personalizado} → valor de um campo de perfil personalizado do usuário.

Curso:

{course:fullname} → nome completo do curso.

{course:identificador_campo_personalizado} → valor de um campo personalizado do curso.

Esse recurso oferece grande flexibilidade para a personalização de certificados, adaptando o conteúdo conforme as informações específicas de cada usuário e curso.

🔧 Instalação
Clone ou baixe o repositório:

bash
Copiar
Editar
git clone https://github.com/vandersonfarias/moodle-customcertelement_textreplace.git
Copie a pasta do plugin para o diretório de elementos do Custom Certificate no Moodle:

swift
Copiar
Editar
[moodle]/mod/customcert/element/
Acesse a interface de administração do Moodle e siga as instruções para concluir a instalação do plugin.

Adicione o elemento Text Replace ao seu certificado personalizado e configure conforme necessário.

⚙️ Configuração
Ao editar ou criar um certificado, adicione o elemento Text Replace.

Defina os textos ou placeholders a serem substituídos e os valores correspondentes.

Salve o certificado e visualize a substituição aplicada no certificado gerado.

✅ Requisitos
Moodle com o plugin Custom Certificate instalado e configurado.

Acesso de administrador ou permissões adequadas para instalação de plugins.

📄 Licença
Este projeto está licenciado sob a GNU GPL v3.

🙋‍♂️ Contribuições
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests com melhorias, correções ou sugestões.

📫 Contato
Desenvolvido por Vanderson Farias.
Em caso de dúvidas ou sugestões, entre em contato através do GitHub.

