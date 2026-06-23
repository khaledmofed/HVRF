#!/bin/sh

export PORT=${PORT:-8080}

envsubst '${PORT}' < /etc/nginx/nginx.conf > /tmp/nginx_rendered.conf
cp /tmp/nginx_rendered.conf /etc/nginx/nginx.conf

# Append runtime DB + URL from App Platform (secrets baked into .env at build time)
{
  echo "APP_URL=${APP_URL:-http://localhost}"
  echo "DB_CONNECTION=${DB_CONNECTION:-pgsql}"
  echo "DATABASE_URL=${DATABASE_URL}"
  echo "DB_URL=${DB_URL:-${DATABASE_URL}}"
} >> /var/www/html/.env

php /var/www/html/artisan config:clear || true

echo "Running migrations..."
php /var/www/html/artisan migrate --force || echo "[startup] migrate skipped"

php /var/www/html/artisan cache:clear || true
php /var/www/html/artisan storage:link --force || true

if [ "$RUN_SEEDER" = "true" ]; then
    echo "Running seeders..."
    php /var/www/html/artisan db:seed --force || echo "[startup] seed skipped"
fi

php /var/www/html/artisan roadmap:ensure-phase3 || true

echo "Starting supervisord on port $PORT..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
