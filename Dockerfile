# Use a imagem oficial do PHP como base
FROM php:7.4-apache

# Atualizar imagem e instalar bibliotecas necessarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libicu-dev

# Instalar extenções do php
RUN docker-php-ext-install mysqli pdo pdo_mysql intl

RUN apt install -y default-mysql-server
# Ativar Apache mod_rewrite
RUN a2enmod rewrite

# Definir diretório de trabalho
WORKDIR /var/www/html

# Instalar Composer e definir diretório de instalação
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

# Baixar e extrair CodeIgniter 4
RUN curl -LOk https://github.com/project-ePDV/epdv-backend/archive/refs/heads/main.zip  
RUN unzip main.zip
RUN rm main.zip     
RUN mv epdv-backend-main/* .
RUN rm -rf epdv-backend-main

# Baixar e atualizar as dependências do projeto
RUN composer install --no-dev --no-scripts --no-autoloader && \
    composer update --no-dev

# Copiar arquivo de configuração do Apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Dar permissão no diretório de trabalho
RUN chmod -R 777 /var/www/html/public && \
    chmod -R 777 /var/www/html/writable && \
    chmod -R 777 /var/www/html

# Definir variáveis de ambiente para conexão com o MySQL
ENV DB_HOST=db_epdv \
    DB_DATABASE=db_epdv \
    DB_USERNAME=admin \
    DB_PASSWORD=admin123

# Definir diretório raiz do Apache e logs
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public \
    APACHE_LOG_DIR=/var/log/apache2 \
    APACHE_ERROR_LOG_DIR=/var/log/apache2

# Expor porta 80 para o Apache
EXPOSE 80

# Iniciar web service do Apache
CMD ["apache2-foreground"]
