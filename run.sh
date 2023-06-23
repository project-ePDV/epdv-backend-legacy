#!/bin/bash
cat run.sh
echo 'Initializing....'
echo 'Instaling dependeces....'
composer install

apt-get purge mysql-server mysql-common
apt-get purge mysql-client

apt-get autoremove mysql-server mysql-client mysql-common

apt-get autoclean mysql-server mysql-client mysql-common

sudo apt-get install mysql-server mysql-common mysql-client

echo 'Login mysql....'
mysql -u root -h localhost -e 'create database db_epdv'

echo 'Starter apache server....'
apache2-foreground -D Listen=0.0.0.0:3000
