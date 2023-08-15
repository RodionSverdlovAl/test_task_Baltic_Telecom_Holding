# Используем образ PHP с поддержкой FPM
FROM php:8.1.0-fpm



# Установка зависимостей
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libpq-dev # Добавили зависимость для PostgreSQL

# Конфигурирование расширений PHP
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd zip pdo_mysql pdo_pgsql # Добавили pdo_pgsql

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка рабочей директории
WORKDIR /var/www/html

# Копирование файлов приложения
COPY . /var/www/html

# Установка зависимостей Laravel
RUN composer install --ignore-platform-reqs --no-interaction

# Копирование файла .env
RUN cp .env.example .env

# Генерация ключа приложения
RUN php artisan key:generate

# Установка прав доступа к файлам
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Открытие порта
# Открытие портов для PHP-FPM и MailHog
EXPOSE 9000 8025

# Запуск PHP-FPM
CMD ["php-fpm"]
