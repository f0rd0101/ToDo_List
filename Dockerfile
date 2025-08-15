# ===============================
# Этап 1: Node + сборка фронтенда
# ===============================
FROM node:20 AS node_build
WORKDIR /app

# Копируем package.json и package-lock.json
COPY package*.json ./

# Устанавливаем зависимости Node
RUN npm ci

# Копируем весь проект
COPY . .

# Сборка фронтенда (Vite)
RUN npm run build

# ===============================
# Этап 2: Composer + Laravel
# ===============================
FROM composer:2 AS composer_stage
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# ===============================
# Этап 3: PHP + Nginx
# ===============================
FROM php:8.2-fpm

# Устанавливаем пакеты и расширения PHP
RUN apt-get update && apt-get install -y \
    nginx unzip git curl libpng-dev libonig-dev libxml2-dev zip libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Настраиваем Nginx
RUN rm /etc/nginx/sites-enabled/default
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf

# Копируем Laravel проект
WORKDIR /var/www/html
COPY . .

# Копируем vendor и сборку фронтенда из предыдущих этапов
COPY --from=composer_stage /app/vendor vendor
COPY --from=node_build /app/public/build public/build

# Права на файлы и директории
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Копируем стартовый скрипт
COPY ./docker/start.sh /start.sh
RUN chmod +x /start.sh

# Порт для Nginx
EXPOSE 80

# Запуск
CMD ["/start.sh"]
