# Use PHP 8.3 Apache base image
FROM php:8.3-apache

# Install PDO extension for MySQL
RUN docker-php-ext-install pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy application files to the container
COPY . .

# Expose port 80
EXPOSE 80
