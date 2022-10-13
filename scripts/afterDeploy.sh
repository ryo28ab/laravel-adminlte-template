#!/bin/sh

cd /var/www/html
composer install --no-dev
php artisan migrate --force
php artisan scribe:generate
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
