FROM php:8.2-fpm

# Рабочая директория внутри контейнера
WORKDIR /var/www

# Установка необходимых зависимостей
RUN apt-get update && apt-get install -y \
    zip unzip curl git libxml2-dev libzip-dev libpng-dev libjpeg-dev libonig-dev \
    sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копирование исходников
COPY . /var/www

# Установка прав доступа
RUN chown -R www-data:www-data /var/www

# Открываем порт
EXPOSE 8000

# Стартовая команда: ждём, пока база поднимется, и только потом запускаем Laravel
CMD bash -c "composer install && php artisan key:generate && php artisan serve --host=0.0.0.0 --port=8000"
