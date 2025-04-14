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
    libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ----------------------------------------
# Phase 1: Copy only what's needed for composer install
# ----------------------------------------

# Copy composer files for layer caching
COPY composer.json composer.lock ./ 

# Copy Laravel app files (without migrations and .env yet)
COPY artisan artisan
COPY bootstrap ./bootstrap
COPY config ./config
COPY routes ./routes
COPY app ./app

# Install dependencies without dev packages
RUN composer install --no-dev --optimize-autoloader

# ----------------------------------------
# Phase 2: Copy the rest of the app (e.g. public, resources, migrations, etc.)
# ----------------------------------------

# Copy migrations and other app files (public, resources, storage, etc.)
COPY database/migrations ./database/migrations
COPY . .

# ----------------------------------------
# Apache & Laravel Specific Configurations
# ----------------------------------------

# Set Apache DocumentRoot to public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache config and suppress ServerName warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Fix permissions (adjust for your environment if needed)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Expose port 80
EXPOSE 80

# Add migration and start Apache web server
CMD php artisan migrate --force && apache2-foreground
