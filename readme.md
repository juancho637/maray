# Requisitos

- [Docker](https://www.docker.com/).
- [Git](https://git-scm.com/).
- Para la facil gestión del repositorio [Sourcetree](https://www.sourcetreeapp.com/) o el gestor de repositorios de tu preferencia.

# Antes de comenzar

Tener en cuenta que para ejecutar cualquier comando en el contenedor se debe anteponer la ejecución de docker compose como lo muestra la siguiente linea:
```sh
$ docker-compose exec (servicio parametrizado en el docker-compose.yml) (comando a ejecutar)
```

# Pasos para la instalación del proyecto

* Levantar servicios de docker (si se necesita modificar los parametros del servidor en local, se realizan en el archivo docker-compose.yml):
```sh
$ docker-compose up -d
```

* Instalación de los paquetes de laravel:
```sh
$ docker-compose exec app composer install
```

* Creación del archivo para las variables de entorno (despues de este paso se configura el archivo .env con los datos respectivos):
```sh
$ docker-compose exec app cp .env.example .env 
```

* Generación de la llave privada de laravel:
```sh
$ docker-compose exec app php artisan key:generate
```

* Generar y/o refrescar las migraciones del proyecto:
```sh
$ docker-compose exec app php artisan migrate:fresh --seed
```

## Otros comandos

* Visualizar rutas de la aplicación:
```sh
$ docker-compose exec app php artisan r:l
```