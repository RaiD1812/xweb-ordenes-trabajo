# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
    && docker-php-ext-install pdo pdo_mysql zip

# Habilita mod_rewrite (importante para Laravel)
RUN a2enmod rewrite

# Copia los archivos del proyecto
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia Composer desde la imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala dependencias de Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Genera la key de Laravel
RUN php artisan key:generate

# Expone el puerto para Railway
EXPOSE 8000

# Comando para iniciar Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
