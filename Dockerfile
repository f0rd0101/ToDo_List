# Этап 1: Composer install
FROM composer:2 AS composer_stage
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Этап 2: Laravel + PHP + Nginx
FROM php:8.2-fpm

# Устанавливаем нужные пакеты и расширения PHP
RUN apt-get update && apt-get install -y \
    nginx unzip git curl libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Настраиваем Nginx
RUN rm /etc/nginx/sites-enabled/default
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf

# Копируем проект
WORKDIR /var/www/html
COPY . .
COPY --from=composer_stage /app/vendor vendor

# Права
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Скрипт запуска
COPY ./docker/start.sh /start.sh
RUN chmod +x /start.sh

# Открываем порт
EXPOSE 80

# Запуск скрипта
CMD ["/start.sh"]
