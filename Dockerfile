FROM php:8.2-fpm

WORKDIR /var/www

# Установка системных зависимостей и PHP-расширений
RUN apt-get update && apt-get install -y \
    zip unzip curl git libxml2-dev libzip-dev libpng-dev libjpeg-dev libonig-dev \
    sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем все файлы проекта
COPY . /var/www

# Установка прав
RUN chown -R www-data:www-data /var/www

# Установка зависимостей Laravel
RUN composer install --no-dev --optimize-autoloader

# Открываем порт (Render передаёт порт через переменную $PORT)
EXPOSE 8000

# Запуск приложения на нужном порту (переменная $PORT задаётся Render)
CMD bash -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"
