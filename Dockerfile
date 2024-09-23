# Official PHP 8.2 image as the base image
FROM php:8.2-fpm

# Update the package list and install necessary packages
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libfreetype6-dev libjpeg62-turbo-dev libzip-dev && \
    docker-php-ext-install gd && \
    docker-php-ext-install zip && \
    docker-php-ext-install fileinfo 

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create a new user and group
RUN groupadd -r app && useradd -r -g app -G root -u 1000 app

USER app

# Set the working directory
WORKDIR /app

# Copy the composer. json and composer.lock files
COPY composer.json ./

# Install PHP dependencies
RUN composer install

# Copy files
COPY . ./app

# Set the command to run phpbench
CMD ["vendor/bin/phpbench", "run", "--report=main", "--output=build-chart"]