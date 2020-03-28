
<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

Explicación de las funcionalidades de Laravel 6 siguiendo los videos de [Laracast](https://laracasts.com/series/laravel-6-from-scratch). Para facilitar su puesta en marcha se ha desarrollado sobre docker.

## Despliegue

1. Creamos e inicializamos todos los contenedores
```sh
docker-compose up -d --build
```

2. Obtener la ip del contenedor con la base de datos
```sh
docker ps
docker inspect <container ID> | grep "IPAddress"
```

3. Entramos al contenedor con php
```sh
docker exec -it laravel6_php_1 bash
```

4. Dentro del contenedor, instalar dependencias, crear el fichero .env y generar la key
```sh
composer install
cp .env.example .env
php artisan key:generate
```

5. Actualizar el parametro `DB_HOST` del fichero `.env`, con la ip con la devuelta en el paso 2.

6. Ejecutar las migracione y datos de prueba
```sh
php artisan migrate:install
php artisan migrate:fresh --seed
```

7. Acceder a la web mediante `http://localhost:8080`.

## Comandos Docker

```sh
# Visualiza los contenedores en ejecución
docker-compose top

# Acceder a un contenedor
docker exec -it <nombre_contenedor> bash

# Inicializar servicios
docker-compose start

# Paramos todos los contenedores
docker-compose stop

# Paramos y borramos todos los contenedores
docker-compose down
```
