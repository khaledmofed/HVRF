FROM php:8.2-fpm-alpine

# Install system deps + nginx
RUN apk add --no-cache nginx git curl zip unzip libpq-dev supervisor gettext \
    && docker-php-ext-install pdo pdo_pgsql opcache

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy app
COPY . .

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Storage symlink & permissions
RUN php artisan storage:link || true \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Nginx config
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Supervisor config
COPY docker/supervisord.conf /etc/supervisord.conf

COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 10000

CMD ["/start.sh"]
