# Use official PHP with Composer pre-installed
FROM composer:2.7 AS build

# Set working directory
WORKDIR /app

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Copy project files
COPY . .

# Build optimized Laravel cache
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Production image with PHP + Apache
FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Copy project from build stage
COPY --from=build /app /var/www/html

# Set working directory
WORKDIR /var/www/html

# Expose port Render expects
EXPOSE 10000

# Change Apache default port to 10000
RUN sed -i 's/80/10000/' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Set permissions for storage & bootstrap
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Start Apache
CMD ["apache2-foreground"]
