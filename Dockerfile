FROM php:7.3-fpm

RUN apt-get update -y
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql