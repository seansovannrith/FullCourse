#!/bin/bash
set -e

# composer install
# wait $!
# npm install
# wait $!
php artisan key:generate
wait $!
php artisan migrate
wait $!
php artisan serve --host=0.0.0.0 --port=8000 &
php artisan queue:work --tries=3 --timeout=90
exec supervisord -c /etc/supervisor/conf.d/supervisord.development.conf