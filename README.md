# Movies CRUD - StepMovies

Aplicación web CRUD para gestionar una lista de películas usando PHP, MySQL, JavaScript y CSS.

## Descripción

Este proyecto permite:

- Listar películas desde la base de datos.
- Agregar nuevas películas.
- Editar películas existentes.
- Eliminar películas con confirmación.

La interfaz principal está en `index.php` y las operaciones se realizan con peticiones `fetch` a scripts PHP dentro de `back-end/models`.

## Tecnologías

- PHP
- MySQL (MariaDB en XAMPP)
- JavaScript (Fetch API)
- HTML5
- CSS3

## Requisitos

- XAMPP (Apache + MySQL)
- PHP 8 o superior (recomendado)
- Navegador web moderno

## Instalación y ejecución

1. Coloca la carpeta del proyecto en:

   `c:/xampp/htdocs/moviesCrud`

2. Inicia Apache y MySQL desde XAMPP Control Panel.

3. Crea la base de datos `movies`.

4. Crea la tabla `movies` con esta estructura:

```sql
CREATE TABLE movies (
  id INT AUTO_INCREMENT PRIMARY KEY,
   title VARCHAR(255) NOT NULL,
  genre VARCHAR(100) NOT NULL,
  year INT NOT NULL,
  score INT NOT NULL,
  comments TEXT
);
```

5. Verifica los datos de conexión en `config/connection.php`:

- host: `localhost`
- usuario: `root`
- contraseña: vacía
- base de datos: `movies`
- puerto: `3308`

6. Abre en el navegador:

   `http://localhost/moviesCrud/`

## Estructura del proyecto

```text
moviesCrud/
├── index.php
├── assets/
├── back-end/
│   └── models/
│       ├── add_movie.php
│       ├── insert_movie.php
│       ├── update_movie.php
│       ├── edit_movie.php
│       ├── remove_movie.php
│       └── delete_movie.php
├── config/
│   └── connection.php
├── css/
│   └── styles.css
└── js/
    └── main.js
```

## Flujo CRUD

### Create

- Se abre el formulario con `add_movie.php`.
- Se envía por `POST` a `insert_movie.php`.
- Responde JSON con `success` y `message`.

### Read

- `index.php` consulta `SELECT * FROM movies` y muestra la tabla.

### Update

- Se carga formulario de edición con `update_movie.php?id={id}`.
- Se envía por `POST` a `edit_movie.php`.
- Responde JSON con `success` y `message`.

### Delete

- Se muestra confirmación con `remove_movie.php?id={id}`.
- El borrado se ejecuta contra `delete_movie.php?id={id}`.

## Notas importantes

- Actualmente hay consultas SQL construidas por concatenación directa. Para producción se recomienda usar sentencias preparadas para evitar inyección SQL.
- `delete_movie.php` usa `$_GET` para recibir el id y elimina el registro. Conviene migrar a `POST` con validaciones adicionales.

## Autor

Desarrollado por Sebastián.
