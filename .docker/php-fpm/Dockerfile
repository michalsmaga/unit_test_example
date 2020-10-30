FROM php:7.4-fpm

# Install software
RUN apt-get update
RUN apt-get install -y vim tree htop libonig-dev

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring

# Set ID for user and group
RUN groupmod -g 1000 www-data
RUN usermod -u 1000 www-data

# Set working directory
WORKDIR /var/www

## Change current user to www
USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]

