FROM ubuntu:latest AS base

ENV DEBIAN_FRONTEND noninteractive

# Install dependencies
RUN apt update && apt install -y software-properties-common
RUN add-apt-repository -y ppa:ondrej/php && apt update

# Install PHP and extensions
RUN apt install -y php8.2 \
    php8.2-cli \
    php8.2-common \
    php8.2-fpm \
    php8.2-pgsql \ 
    php8.2-zip \
    php8.2-gd \
    php8.2-mbstring \
    php8.2-curl \
    php8.2-xml \
    php8.2-bcmath \
    php8.2-pdo

# Install composer
RUN apt install -y curl && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js
RUN apt install -y ca-certificates gnupg && \
    mkdir -p /etc/apt/keyrings && \
    curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg && \
    echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_20.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list && \
    apt update && \
    apt install -y nodejs

# Install Nginx
RUN apt install -y nginx
RUN echo "\
    server {\n\
    listen 80;\n\
    listen [::]:80;\n\
    root /var/www/html/public;\n\
    add_header X-Frame-Options \"SAMEORIGIN\";\n\
    add_header X-Content-Type-Options \"nosniff\";\n\
    index index.php;\n\
    charset utf-8;\n\
    location / {\n\
    try_files \$uri \$uri/ /index.php?\$query_string;\n\
    }\n\
    location = /favicon.ico { access_log off; log_not_found off; }\n\
    location = /robots.txt  { access_log off; log_not_found off; }\n\
    error_page 404 /index.php;\n\
    location ~ \.php$ {\n\
    fastcgi_pass unix:/run/php/php8.2-fpm.sock;\n\
    fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;\n\
    include fastcgi_params;\n\
    }\n\
    location ~ /\.(?!well-known).* {\n\
    deny all;\n\
    }\n\
    }\n" > /etc/nginx/sites-available/default

# Start script
RUN echo "\
    #!/bin/sh\n\
    echo \"Starting services...\"\n\
    service php8.2-fpm start\n\
    nginx -g \"daemon off;\" &\n\
    echo \"Ready.\"\n\
    tail -s 1 /var/log/nginx/*.log -f\n\
    " > /start.sh && chmod +x /start.sh

# Copy application files
COPY . /var/www/html
WORKDIR /var/www/html

# Install dependencies
RUN composer install
RUN npm install
RUN npm run build

# Adjust permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 555 /var/www/html && \
    chmod -R 777 /var/www/html/storage/

EXPOSE 80

CMD ["sh", "/start.sh"]
