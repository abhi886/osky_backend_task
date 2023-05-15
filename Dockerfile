FROM php:7.4-apache

# Install any necessary dependencies
RUN apt-get update && \
    apt-get install -y \
        git \
        zip \
        unzip

# Copy your PHP code into the image
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html