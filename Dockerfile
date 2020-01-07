FROM php:7.4.1-fpm-buster

# Actualizar los paquetes
RUN apt-get update && apt-get install -y

# Añadir nuevos  paquetes
RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
    && docker-php-ext-install \
        zip \
        intl \
		mysqli \
        pdo pdo_mysql

# Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# We need a user with the same UID/GID with host user
# Al ejecutar comandos CLI dentro del contenedor, mantener el usuario y no pasen a ser root
ARG uid
RUN useradd -G www-data,root -u $uid -d /home/devuser devuser
RUN mkdir -p /home/devuser/.composer && \
    chown -R devuser:devuser /home/devuser
USER devuser

# Aliases
RUN echo 'alias pa="php artisan "' >> ~/.bashr
RUN echo 'alias pu="vendor/bin/phpunit "' >> ~/.bashr

# Copiar el codigo y establecer el directorio de trabajo
COPY src/ /var/www/laravel
WORKDIR /var/www/laravel/
