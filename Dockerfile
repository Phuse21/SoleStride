FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    # Install MySQL PDO extension
    && docker-php-ext-install pdo_mysql\
    # Install Node.js (using NodeSource)
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install mbstring

WORKDIR /app
COPY . /app

RUN composer install

# Install Node.js dependencies and run the build
RUN npm install && npm run build

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

