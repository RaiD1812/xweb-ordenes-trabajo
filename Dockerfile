FROM php:8.2-apache

# Instala dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Habilita mod_rewrite
RUN a2enmod rewrite

# Copia proyecto
COPY . /var/www/html

WORKDIR /var/www/html

# Copia Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala dependencias de Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader || true

# Genera key de Laravel
RUN php artisan key:generate

EXPOSE 8000

# Comando para iniciar Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
