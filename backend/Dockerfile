FROM php:8.2

# Установка системных пакетов
RUN apt-get update -y && apt-get install -y \
    zip unzip git curl gnupg \
    libonig-dev libpng-dev libxml2-dev \
    && docker-php-ext-install pdo mbstring pdo_mysql pcntl

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка Node.js (совместимая с Vite 6)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Установка рабочей директории
WORKDIR /app/backend

# Сначала копируем только файлы, необходимые для npm/composer install
COPY package.json package-lock.json* ./ 
COPY vite.config.js ./

# Устанавливаем npm зависимости
RUN npm install

# Копируем остальные файлы проекта
COPY . .

# Устанавливаем зависимости Laravel
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Собираем frontend


# Открываем порт
EXPOSE 8000

# Запускаем Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
