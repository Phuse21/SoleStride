FROM ubuntu:latest AS base

ENV DEBIAN_FRONTEND noninteractive

# Install dependencies
RUN apt update && apt install -y software-properties-common \
    && add-apt-repository -y ppa:ondrej/php \
    && apt update && apt install -y \
    php8.2-cli php8.2-common php8.2-mysql php8.2-zip php8.2-gd \
    php8.2-mbstring php8.2-curl php8.2-xml php8.2-bcmath php8.2-pdo \
    curl unzip git nodejs npm

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set up working directory
WORKDIR /var/www/html
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Install Node.js dependencies and build assets
RUN npm install && npm run build

# Cache Laravel configs and routes
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Set permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose Render's required port
EXPOSE 10000

# Start the Laravel app
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
