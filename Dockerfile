FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www

COPY package.json package-lock.json /var/www/
RUN npm install --legacy-peer-deps
RUN npm run

RUN apt-get update && apt-get install -y bash

RUN echo "upload_max_filesize = 512M\npost_max_size = 512M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "memory_limit=512M" > /usr/local/etc/php/conf.d/memory-limit.ini


COPY . /var/www
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
