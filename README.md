# Actividad: CRUD PHP con Arquitectura MVC + DAO

Sistema web desarrollado en PHP con patrón arquitectónico **MVC (Modelo - Vista - Controlador)** y patrón de acceso a datos **DAO (Data Access Object)**.

## 📌 Asignación
* **Sistema / Base de Datos:** Parqueo (`parqueo`)
* **Tabla Principal:** Autos (`auto`)
* **Campos:** `id`, `placa`, `color`, `modelo`, `tipoauto`, `fotografia`

*(Incluye también el módulo del catálogo de Productos `tienda1` de la guía).*

## 🚀 Requisitos
* PHP 8.0 o superior
* MySQL / MariaDB (o XAMPP / MAMP)
* Extensión PDO MySQL habilitada

## 🛠️ Instalación y Puesta en Marcha

1. **Importar la base de datos:**
   Ejecutar el archivo `database.sql` en MySQL Workbench o phpMyAdmin:
   ```sql
   source database.sql;
   ```

2. **Configuración de base de datos:**
   Revisar el archivo `config/database.php` con las credenciales de tu servidor MySQL.

3. **Iniciar el servidor local:**
   En la terminal, dentro de la carpeta del proyecto:
   ```bash
   php -S localhost:8000
   ```
   O ejecutando el script:
   ```bash
   bash iniciar.sh
   ```

4. **Abrir en el navegador:**
   [http://localhost:8000](http://localhost:8000)

## 📁 Estructura del Proyecto
* `config/`: Configuración y conexión PDO a la base de datos.
* `controlador/`: Controladores que gestionan las peticiones y la lógica de negocio.
* `modelo/`: Clases entidad y clases DAO para el acceso y manipulación de datos en MySQL.
* `vista/`: Interfaces de usuario (formularios y tablas de listado).
* `public/`: Archivos estáticos (hojas de estilo CSS e imágenes subidas).
* `index.php`: Enrutador frontal (Front Controller).
