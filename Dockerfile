FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libzip-dev unzip zip sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql zip pdo_sqlite

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy app files
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Laravel specific commands
RUN composer install --no-dev --optimize-autoloader && \
    cp .env.example .env && \
    php artisan key:generate && \
    touch database/database.sqlite && \
    php artisan migrate --force

# Expose port
EXPOSE 80
