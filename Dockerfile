FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ----------------------------------------
# Stage 1: Dependency installation
# ----------------------------------------

# Copy composer files first for caching
COPY composer.json composer.lock ./

# Copy minimum required Laravel files to allow Composer post-scripts to work
COPY artisan artisan
COPY bootstrap ./bootstrap
COPY config ./config
COPY routes ./routes
COPY app ./app

# Install PHP dependencies without dev packages
RUN composer install --no-dev --optimize-autoloader

# ----------------------------------------
# Stage 2: Application setup
# ----------------------------------------

# Now copy the full application (public, resources, etc.)
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
