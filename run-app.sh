#!/bin/bash
set -e

echo "Running migrations..."
export DATABASE_URL="mysql://$MYSQLUSER:$MYSQLPASSWORD@$MYSQLHOST:$MYSQLPORT/$MYSQLDATABASE"

php bin/console doctrine:migrations:migrate --no-interaction || true

echo "Starting server..."
php -S 0.0.0.0:$PORT -t public
