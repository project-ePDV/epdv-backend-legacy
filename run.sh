#!/bin/bash

echo 'hello world'
composer update
sudo service mysql start
mysql -u root -h localhost -p admin123 -e 'create database db_epdv'
apache2-foreground -D Listen=0.0.0.0:3000
