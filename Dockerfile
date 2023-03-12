# Use the official PHP image as base
FROM php:7.4-apache

# Atualizar imagem
RUN apt-get update

# Instalar bibliotecas necessarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip

# Instalar extenções do php
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Instalar e atualizar dependencias do composer
RUN apt-get update && apt-get install -y libicu-dev && docker-php-ext-install intl

# Ativar Apache mod_rewrite
RUN a2enmod rewrite

# Entrar no diretorio /var/www/html
WORKDIR /var/www/html

# Baixar e extrair CodeIgniter 4
RUN curl -LOk https://github.com/codeigniter4/CodeIgniter4/archive/v4.1.4.zip && \
    unzip v4.1.4.zip && \
    rm v4.1.4.zip && \
    mv CodeIgniter4-4.1.4/* . && \
    rm -rf CodeIgniter4-4.1.4

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Copiar as novas configurações pro apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Dar permissão no diretorio html
RUN chmod -R 777 /var/www/html/public
RUN chmod -R 777 /var/www/html/writable

# Set environment variables for MySQL connection
ENV DB_HOST = db_epdv \
    DB_DATABASE = db_epdv \
    DB_USERNAME = admin \
    DB_PASSWORD = admin123

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_ERROR_LOG_DIR /var/log/apache2

# Habilitar porta 80 para o Apache
EXPOSE 80

# Baixar as dependencias do projeto
RUN composer install
RUN composer update

# Iniciar web service
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]


