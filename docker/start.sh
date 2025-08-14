#!/bin/bash
set -e

echo "Running Laravel setup..."

# Выполняем миграции
php artisan migrate --force

# Чистим и кэшируем
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
