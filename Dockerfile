# Stage 1: Build frontend assets
FROM node:14 AS node-build
WORKDIR /app
COPY package.json package-lock.json* ./
RUN npm install
COPY webpack.mix.js ./
COPY resources/ ./resources/
RUN npm run production

# Stage 2: PHP + Composer
FROM php:7.4-cli

# Install system dependencies
RUN apt-get update \
    && apt-get install -y libpng-dev libonig-dev libxml2-dev zip unzip git curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy backend source
COPY . .

# Copy built assets from node-build
COPY --from=node-build /app/public/js public/js
COPY --from=node-build /app/public/css public/css

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy .env if exists (user should mount or build with it)
# COPY .env.example .env

# Generate app key if not set
RUN php artisan key:generate || true

# Expose port
EXPOSE 10000

# Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"] 