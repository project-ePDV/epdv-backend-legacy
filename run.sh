#!/bin/bash

echo 'hello world'
composer update
mysql
apache2-foreground -D Listen=0.0.0.0:3000
