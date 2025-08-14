#!/bin/bash
set -e

echo "Running Laravel setup..."

# Только artisan команды
php artisan package:discover --ansi
php artisan migrate --force

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting PHP-FPM & Nginx..."
php-fpm -D
nginx -g "daemon off;"
