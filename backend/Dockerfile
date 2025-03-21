FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql zip mbstring exif pcntl bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

COPY . .

RUN composer install --optimize-autoloader --no-dev
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000

CMD ["php-fpm"]
