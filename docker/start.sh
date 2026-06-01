#!/bin/sh
set -e

# Use Render's $PORT or default to 10000
export PORT=${PORT:-10000}

# Inject $PORT into nginx config (only replaces ${PORT}, leaves nginx $vars intact)
envsubst '${PORT}' < /etc/nginx/nginx.conf > /tmp/nginx_rendered.conf
cp /tmp/nginx_rendered.conf /etc/nginx/nginx.conf

echo "Running migrations..."
php /var/www/html/artisan migrate --force

echo "Ensuring Phase 3 roadmap data..."
php /var/www/html/artisan roadmap:ensure-phase3

echo "Clearing application cache..."
php /var/www/html/artisan cache:clear

echo "Creating storage symlink..."
php /var/www/html/artisan storage:link --force

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
