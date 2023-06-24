#!/bin/bash
cat run.sh
echo 'Initializing....'
echo 'Instaling dependeces....'
rm -rf vendor/
composer install

#-------------------

sudo apt update -y

curl -LsS https://r.mariadb.com/downloads/mariadb_repo_setup | bash

sudo apt-get install mariadb-server mariadb-client -y

mysql -V
#-------------------

echo 'Install mysql'
apt-get install mariadb-server mysql-common mariadb-client -y

chmod 777 /var/run/mysqld/mysqld.sock

echo 'Login mysql....'
mysql -u root -h localhost -e 'create database db_epdv'

echo 'Starter apache server....'
apache2-foreground -D Listen=0.0.0.0:3000
