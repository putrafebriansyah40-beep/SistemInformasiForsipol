FROM php:8.4-cli

# Install system dependencies (minimal to save RAM)
RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip zip libzip-dev libsqlite3-dev nodejs npm \
    && docker-php-ext-install pdo pdo_sqlite zip bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy composer files first (for caching)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

# Copy package files and build frontend
COPY package.json package-lock.json ./
RUN npm ci --ignore-scripts && npm run build && rm -rf node_modules

# Copy the rest of the application
COPY . .

# Run post-install scripts
RUN composer dump-autoload --optimize

# Setup Laravel
RUN cp .env.example .env \
    && php artisan key:generate \
    && mkdir -p database \
    && touch database/database.sqlite \
    && php artisan migrate --force \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Expose port
EXPOSE 8000

# Start the application
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
