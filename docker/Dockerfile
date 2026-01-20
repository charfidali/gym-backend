FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    git unzip icu-dev oniguruma-dev libzip-dev \
    postgresql-dev mysql-client

RUN docker-php-ext-install \
    pdo pdo_mysql intl zip opcache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /app

CMD ["php-fpm"]
