#!/bin/sh
set -eu

PORT="${PORT:-10000}"

sed -ri "s/^Listen 80$/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" \
    /etc/apache2/sites-available/000-default.conf

php artisan config:cache
php artisan migrate --force
php artisan db:seed --class='Database\Seeders\QuestionSeeder' --force
php artisan db:seed --class='Database\Seeders\AdminUserSeeder' --force

exec apache2-foreground
