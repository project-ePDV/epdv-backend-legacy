#!/bin/bash
cat run.sh
echo 'Initializing....'
echo 'Instaling dependeces....'
composer install

echo 'Starter mysql....'
service mysql start

echo 'Login mysql....'
mysql -u root -h localhost -e 'create database db_epdv'

echo 'Starter apache server....'
apache2-foreground -D Listen=0.0.0.0:3000
