#!/bin/bash

set -e

if [ -f /var/www/.env ]; then
    export $(grep -v '^#' /var/www/.env | xargs)
else
    echo "Error: .env file not found"
    exit 1
fi

composer install

php artisan optimize:clear --no-interaction || true
php artisan optimize --no-interaction || true


crontab -l | { cat; echo "* * * * * /usr/local/bin/php /var/www/artisan schedule:run >> /var/www/storage/logs/cron.log 2>&1"; } | crontab -

cron

exec "$@"
