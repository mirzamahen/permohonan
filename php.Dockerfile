FROM php:8.0-apache-bullseye

COPY src/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html/uploads/*

# pdo_mysql extensions
RUN docker-php-ext-install pdo_mysql

# mysqli extensions
RUN docker-php-ext-install mysqli

RUN a2enmod rewrite