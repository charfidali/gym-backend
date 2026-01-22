#!/bin/bash
set -e
echo "installing mysql driver..."

install-php-extensions pdo_mysql intl

echo "Running migrations..."

# run migrations safely
php bin/console doctrine:migrations:migrate --env=prod --no-interaction

echo " migrations done"

# start server
php -S 0.0.0.0:$PORT -t public
