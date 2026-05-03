# Rotten Tangerines 🍊

Hola Vicent, espero que lo encuentres todo en orden.

Le he puesto bastantes ganas a este proyecto, más de las que probablemente se notan a primera vista. Este trabajo me ha frustrado mucho, pero ha tenido momentos de esos en los que algo encaja y, como tu nos decías, un "aaaaaaaaaaaaa" te hace ver que lo estás entendiendo de verdad. Eso es lo que me llevo de haber pasado este año contigo.

Me pone triste que no vayas a ser mi tutor el año que viene, la verdad. Se aprende mucho más cuando el profesor que te toca es, además de profesor, una persona a la que llamar amigo.

Sé que aún quedan las prácticas y que nos vamos a ver más horas seguidas que en todo el año, y que además puede que te tengamos en alguna asignatura el año que viene si tenemos suerte. Pero al ser este el último trabajo al que le pongo esfuerzo que va a llegar a tus manos como mi profesor de programación, necesitaba expresarte mi agradecimiento de alguna forma además de con aquel disco de la rosalía.

Espero que te caliente el corazón esto, pero seguro que ya sabías que no se le suelen dar regalos de navidad a los profesores malos.

---

## Estructura del proyecto

```
/
├── index.php                   # Gestión de rutas y sesión
├── autoload.php                # Carga automática de clases y controllers
├── config.json                 # Configuración de la base de datos
├── controllers/
│   ├── UserController.php      # Login, logout, registro
│   └── ContentController.php   # Catálogo, películas, puntuaciones
├── models/
│   ├── UserBase.php            # Clase abstracta base de usuario
│   ├── User.php                # Usuario estándar
│   ├── Admin.php               # Administrador
│   ├── UserGestor.php          # Lógica de BD para usuarios
│   ├── Movie.php               # Modelo de película
│   ├── Review.php              # Modelo de reseña
│   └── ContentGestor.php       # Lógica de BD para contenido
└── Views/
    ├── Catalog.php             # Catálogo de películas
    ├── MovieDetails.php        # Detalle y puntuación
    ├── MovieForm.php           # Crear / editar película (solo admin)
    ├── Login.php
    ├── Register.php
    └── CSS/
```

---

## Base de datos

El archivo `Rotten_tangerines.sql` crea la base de datos, las tablas, los usuarios y las películas de ejemplo. Las reseñas se generan automáticamente con un `CROSS JOIN` aleatorio para todos los usuarios excepto el admin.

La base de datos está formada por 3 tablas, una de Movies, otra de Users y una tercera para las Reviews, que en esencia son solo una relación entre ambas.

---

## Credenciales automáticas

Todos los usuarios de ejemplo tienen la misma contraseña: **`password`**

El usuario administrador es **`admin`** y es el único que no tiene reseñas asignadas automáticamente al ejecutar la base de datos, por si quieres probar tú mismo cómo funciona el sistema de puntuación.

en caso de que quieras ver las vistas de usuario no hace falta que crees uno nuevo, te he dejado preparado el usuario **`Marcos_FachaRojo_67`** para que hagas pruebas.


---

Gracias por todo este año, Vicent.
Rubén Otero Gascó.