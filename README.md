# 📘 PROYECTO: SISTEMA DE ADMINISTRACIÓN DE USUARIOS Y ROLES

## TABLAS 

+---------------------+            +----------------------------+
|       roles         |            |          usuario           |
+---------------------+            +----------------------------+
| rol_id (PK)         |◄───────────┤ rol_id (FK)                |
| rol                 |            | user_id (PK)               |
| descripcion         |            | nombre                     |
| creado_en           |            | apellido                   |
| actualizado_en      |            | telefono                   |
+---------------------+            | email                      |
                                   | password                   |
                                   | fecha_de_ingreso           |
                                   +----------------------------+


## 📌 Descripción

Este proyecto está desarrollado en PHP bajo el patrón de arquitectura **MVC (Modelo-Vista-Controlador)**. Permite gestionar usuarios, roles y tablas dinámicas desde un panel de administración.

---

## 🗂️ Estructura del Proyecto (MVC)
PROYECTO_VERSION1
    assets
        config
            bloqueados.json
        css
            styles.css
        images
            inconR.jpeg
        js
            create_table.js
            table_list.js
    controllers
        rol
            rol_create.php
            rol_delete.php
            rol_list.php
            rol_update.php
        table
            bloquear_tablas.php
            tabla_create.php
            tabla_list.php
        user
            user_create.php
            user_delete.php
            user_list.php
            user_update.php
        login_close.php
        loginV.php
    models
        Connection.php
        Role.php
        Table.php
        User.php
    views
        menu
            menu_general.php
            menu_usuario.php
        rol
            rol_create_form.php
            rol_delete_form.php
            rol_update_form.php
            role_lis.php
        tabla
            bloquear_tablas.php
            create_table.php
            search_table.php
            table_list_form.php
        user
            user_create_form.php
            user_delete_form.php
            user_list_form.php
            user_update_form.php
        login_form.php
    backup.sql
    index.php
    README.md

## ✅ Funcionalidades principales

- 🔐 Inicio y cierre de sesión con validación
- 👥 CRUD completo para usuarios
- 🛡️ CRUD completo para roles
- 📊 Visualización de cualquier tabla existente
- 🏗️ Creación de nuevas tablas con campos personalizados
- 🔒 Bloqueo de tablas protegidas usando `bloqueados.json`
## ▶️ ¿Cómo ejecutar el proyecto?

1. Copia el backup.sql a tu laragon terminal.
4. Asegúrate de que el archivo `Connection.php` tenga los datos correctos de conexión.
5. Abre `index.php` en tu navegador.

📌 **Requisitos:** PHP 7.4+, MySQL, Navegador moderno.


## 👨‍💻 Autor

- Ronaldinho




