FROM php:8.2-cli

# Install system dependencies + MySQL PDO
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring bcmath gd

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Expose port for artisan serve
EXPOSE 8000

# Default command: run Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
