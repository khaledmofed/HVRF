#!/bin/sh
set -e

echo "Running migrations..."
php /var/www/html/artisan migrate --force

if [ "$RUN_SEEDER" = "true" ]; then
    echo "Running seeders..."
    php /var/www/html/artisan db:seed --force
fi

echo "Caching config..."
php /var/www/html/artisan config:cache
php /var/www/html/artisan route:cache
php /var/www/html/artisan view:cache

echo "Starting supervisord..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
