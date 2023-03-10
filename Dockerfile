# Use the official PHP image as base
FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y libicu-dev && \
    docker-php-ext-install intl

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install necessary libraries and tools
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Download and extract CodeIgniter 4
RUN curl -LOk https://github.com/codeigniter4/CodeIgniter4/archive/v4.1.4.zip && \
    unzip v4.1.4.zip && \
    rm v4.1.4.zip && \
    mv CodeIgniter4-4.1.4/* . && \
    rm -rf CodeIgniter4-4.1.4

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
# Instalação do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install
RUN composer update

# Copy the Apache virtual host configuration file
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Set environment variables for MySQL connection
ENV DB_HOST=mysql \
    DB_DATABASE=epdv \
    DB_USERNAME=root \
    DB_PASSWORD=

# Expose port 80 for Apache
EXPOSE 80

# Start Apache web server
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

RUN composer install
