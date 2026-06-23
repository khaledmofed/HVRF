#!/bin/sh

export PORT=${PORT:-8080}

envsubst '${PORT}' < /etc/nginx/nginx.conf > /tmp/nginx_rendered.conf
cp /tmp/nginx_rendered.conf /etc/nginx/nginx.conf

# php-fpm does not inherit App Platform env vars — write .env for Laravel
cat > /var/www/html/.env <<EOF
APP_NAME=${APP_NAME:-HVRF}
APP_ENV=${APP_ENV:-production}
APP_KEY=${APP_KEY}
APP_DEBUG=${APP_DEBUG:-false}
APP_URL=${APP_URL:-http://localhost}

DB_CONNECTION=${DB_CONNECTION:-pgsql}
DATABASE_URL=${DATABASE_URL}
DB_URL=${DB_URL:-${DATABASE_URL}}

FILESYSTEM_DISK=${FILESYSTEM_DISK:-r2}
CACHE_STORE=${CACHE_STORE:-file}
SESSION_DRIVER=${SESSION_DRIVER:-file}
LOG_CHANNEL=${LOG_CHANNEL:-stderr}
LOG_LEVEL=${LOG_LEVEL:-error}
RUN_SEEDER=${RUN_SEEDER:-true}

R2_ACCESS_KEY_ID=${R2_ACCESS_KEY_ID}
R2_SECRET_ACCESS_KEY=${R2_SECRET_ACCESS_KEY}
R2_BUCKET=${R2_BUCKET}
R2_ENDPOINT=${R2_ENDPOINT}
R2_URL=${R2_URL}
EOF

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
