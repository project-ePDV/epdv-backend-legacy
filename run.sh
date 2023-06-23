#!/bin/bash

echo 'hello world'
composer install
service mysql start
mysql -u root -h localhost -e 'create database db_epdv'
apache2-foreground -D Listen=0.0.0.0:3000
