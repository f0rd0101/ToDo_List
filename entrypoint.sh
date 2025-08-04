#!/bin/sh

# Запускаем миграции
php artisan migrate --force

# Запускаем основную команду (обычно это php-fpm или php artisan serve)
exec "$@"
