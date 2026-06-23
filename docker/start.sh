#!/bin/sh

# DigitalOcean injects PORT=8080; Render uses 10000
export PORT=${PORT:-8080}

envsubst '${PORT}' < /etc/nginx/nginx.conf > /tmp/nginx_rendered.conf
cp /tmp/nginx_rendered.conf /etc/nginx/nginx.conf

echo "Starting web server..."
/usr/bin/supervisord -c /etc/supervisord.conf &
sleep 3

echo "Running migrations..."
php /var/www/html/artisan migrate --force || echo "[startup] migrate skipped"

php /var/www/html/artisan cache:clear || true
php /var/www/html/artisan storage:link --force || true

if [ "$RUN_SEEDER" = "true" ]; then
    echo "Running seeders..."
    php /var/www/html/artisan db:seed --force || echo "[startup] seed skipped"
fi

php /var/www/html/artisan roadmap:ensure-phase3 || true
php /var/www/html/artisan config:cache || true
php /var/www/html/artisan route:cache || true
php /var/www/html/artisan view:cache || true

echo "Startup complete. Waiting on supervisord..."
wait
