#!/bin/bash
cat run.sh
echo 'Initializing....'
echo 'Instaling dependeces....'
composer update
cp vendor/codeigniter4/framework/public/index.php public/index.php
cp vendor/codeigniter4/framework/spark

# apt-get purge mysql-server mysql-common -y
# apt-get purge mysql-client -y

# apt-get autoremove mysql-server mysql-client mysql-common -y

# apt-get autoclean mysql-server mysql-client mysql-common -y

# apt-get install mysql-server mysql-common mysql-client -y

echo 'Install mysql'
apt-get install mariadb-server mysql-common mariadb-client -y

echo 'Login mysql....'
mysql -u root -h localhost -e 'create database db_epdv'

echo 'Starter apache server....'
apache2-foreground -D Listen=0.0.0.0:3000
