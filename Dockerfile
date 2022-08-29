FROM php:7.4-fpm

RUN apt-get update && apt-get install curl && \
  curl -sS https://getcomposer.org/installer | php \
  && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    unzip \
    redis \
    r-base \
    libpq-dev

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip pgsql pdo pdo_pgsql

WORKDIR /var/www

COPY composer.json ./

COPY . .

RUN composer install --no-interaction

RUN chmod -R 777 /var/www/storage

RUN chmod +x artisan

EXPOSE 9000

RUN php artisan key:generate