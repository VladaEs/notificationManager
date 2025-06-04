FROM php:8.2


RUN apt-get update -y && apt-get install -y \
    openssl zip unzip git \
    libonig-dev \
    && docker-php-ext-install pdo mbstring pdo_mysql pcntl


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app/backend

COPY composer.json composer.lock /app/backend/


RUN composer install --no-autoloader --no-scripts


COPY . .



EXPOSE 8000


CMD php artisan serve --host=0.0.0.0 --port=8000