#!/bin/bash

echo 'hello world'
composer update
ls -la 
cat public/index.php
apache2-foreground -D Listen=0.0.0.0:3000