#!/bin/bash
set -e

echo "Running migrations..."
php bin/console doctrine:migrations:migrate --no-interaction || true

echo "Starting server..."
php -S 0.0.0.0:$PORT -t public
