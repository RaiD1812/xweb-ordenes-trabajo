# Usamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Habilita mod_rewrite (importante para Laravel)
RUN a2enmod rewrite

# Copia todo el proyecto al contenedor
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia Composer desde la imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instala dependencias de Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copia .env.example a .env para que Laravel tenga su configuración
RUN cp .env.example .env

# Genera la APP_KEY de Laravel
RUN php artisan key:generate

# Expone el puerto 8000 para Railway
EXPOSE 8000

# Comando para iniciar Laravel dentro del contenedor
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
