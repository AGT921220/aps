FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
# RUN echo 'COMPOSER INSTALL'
# RUN composer install