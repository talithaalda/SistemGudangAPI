FROM php:8.2-fpm-alpine

# Install ekstensi PHP
RUN apk add --no-cache libpng libpng-dev libjpeg-turbo libjpeg-turbo-dev libwebp libwebp-dev \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set direktori kerja
WORKDIR /app

# Salin file aplikasi ke dalam container
COPY . .

# Install dependensi PHP menggunakan Composer
RUN composer install

# Expose port
EXPOSE 9000

# Jalankan PHP-FPM
CMD ["php-fpm"]
