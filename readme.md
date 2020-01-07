
<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

Explicación de las funcionalidades de Laravel 6 siguiendo los videos de [Laracast](https://laracasts.com/series/laravel-6-from-scratch). Para facilitar su puesta en marcha se ha desarrollado sobre docker.

## Despliegue

1. Crear la carpeta mysql

2. Creamos e inicializamos todos los contenedores
```sh
docker-compose up -d --build
```

3. Entramos al contenedor con php
```sh
docker exec -it laravel6_php_1 bash
```

4. Dentro del contenedor, instalar dependencias, crear el fichero .env y generar la key.
```sh
composer install
cp .env.example .env
php artisan key:generate
```

## Comandos básicos docker
```sh
# Inicializar servicios
docker-compose start

# Paramos todos los contenedores
docker-compose stop

# Paramos y borramos todos los contenedores
docker-compose down
```

