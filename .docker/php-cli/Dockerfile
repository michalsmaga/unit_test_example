#ARG PHP_VESRION=7.4
#FROM php:${PHP_VESRION}
FROM php:7.4

# Install software
RUN apt-get update
RUN apt-get install -y vim tree htop libonig-dev

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]

