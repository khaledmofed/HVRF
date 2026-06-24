FROM php:8.2-fpm-alpine

# Install system deps + nginx
RUN apk add --no-cache nginx git curl zip unzip libpq-dev supervisor gettext \
    && docker-php-ext-install pdo pdo_pgsql opcache

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Install PHP deps (before full app copy — .env added at build time in CI)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

COPY . .

RUN test -f .env && grep -q 'APP_KEY=base64:' .env \
    || (echo "BUILD ERROR: .env with APP_KEY must exist (created in GitHub Actions before docker build)" && exit 1)

RUN composer dump-autoload --optimize \
    && php artisan package:discover --ansi || true \
    && chown www-data:www-data .env \
    && chmod 644 .env

# Storage symlink & permissions
RUN php artisan storage:link || true \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Nginx config
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Supervisor config
COPY docker/supervisord.conf /etc/supervisord.conf

COPY docker/start.sh /start.sh
RUN chmod +x /start.sh \
    && echo "clear_env = no" >> /usr/local/etc/php-fpm.d/www.conf

EXPOSE 10000

CMD ["/start.sh"]
