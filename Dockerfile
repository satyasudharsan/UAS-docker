# Gunakan base image PHP 8.0 FPM
FROM php:8.0-fpm

# Instal dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy source code ke container
COPY . /var/www

# Set working directory
WORKDIR /var/www

# Jalankan Composer untuk instalasi dependensi PHP
RUN composer install

# Ubah permission
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage

# Expose port 9000 dan mulai PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]
