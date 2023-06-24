FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN apt-get update && apt-get install -y libxml2-dev
RUN docker-php-ext-install soap

# WORKDIR /var/www/html

# CMD ["php-fpm"]

# EXPOSE 9000
