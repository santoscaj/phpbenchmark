# Official PHP 8.2 image as the base image
FROM php:8.2-fpm

# Update the package list and install necessary packages
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libfreetype6-dev libjpeg62-turbo-dev libzip-dev 

RUN docker-php-ext-install gd && \
    docker-php-ext-install zip && \
    docker-php-ext-install fileinfo 

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /app

# Copy the composer. json and composer.lock files
COPY composer.json ./

# Install PHP dependencies
RUN composer install