# prueba-spira
Desarrollo prueba tecnica spira

1. git clone https://github.com/jhomove1994/prueba-spira.git
2. En la carpeta raiz cd docker
3. docker-compose build app
4. docker-compose up -d
5. docker-compose exec app bash
6. composer install
7. cp .env.example .env
8. php artisan key:generate
9. php artisan migrate --seed
10. php artisan passport:install

11. Seguir pasos repositorio front
https://github.com/jhomove1994/prueba-spira-front


# Datos de administrador
usuario: administrador@email.com
clave: secret

#  Análisis del problema y su posible solución 

Se necesita una aplicacion para llevar un registro de alumnos y cursos, donde se puedan asignar cursos a estudiantes, esta aplicacion debe contar con un sistema de roles donde solo un usuario con perfil administrador puede crear nuevos usuarios, nuevos cursos y asignar cursos, se debe contar con un sistema de autenticacion para los usuarios.

Para el desarrollo del proyecto se crear una api construida en laravel y se consumira en un frontend construido en angular

## Requerimientos
1. Modulo de autenticacion
2. Modulo de usuarios(ver,crear,editar,eliminar)
3. Modulo de cursos(ver,crear,editar,eliminar)
4. Modulo asignacion de cursos(ver,asignar,eliminar)

### Modulo 1
Para el desarrollo del modulo 1 se plantea la implementacion laravel passport el cual proporciona una implementacion completa del servidor OAuth2 acondicionada para laravel; OAuth2 es un estandar para autorizar una aplicacion.

### Modulo 2
Para el desarrollo del modulo 2 se crea un crud con los cuatro endpoints principales para ver listado de usuarios paginados, crear un usuario, editar un usuario por medio del verbo http patch el cual aplica modificaciones parciales a un recurso, y eliminar un usuario por medio del verbo http delete.


### Modulo 3
Para el desarrollo del modulo 3 se crea un crud con los cuatro endpoints principales para ver listado de cursos paginados, crear un curso, editar un curso por medio del verbo http patch el cual aplica modificaciones parciales a un recurso, y eliminar un curso por medio del verbo http delete.


### Modulo 4
Para el desarrollo del modulo 4 se plantea una relacion muchos a muchos con los modelos usuario y cursos, de manera tal que un usuario puede tener muchos cursos asignados y un cursos puede tener muchos usuarios; cuenta con cuatro endpoints para asignar un curso, eliminar un cursos, obtener listado de cursos creados y obtener los cursos asignados a un usuario
