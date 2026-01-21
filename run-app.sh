#!/bin/bash
set -e

echo "Running migrations..."
#!/bin/bash
# wait for MySQL to be ready
until php bin/console doctrine:query:sql "SELECT 1" >/dev/null 2>&1; do
  echo "Waiting for MySQL..."
  sleep 2
done

# run migrations safely
php bin/console doctrine:migrations:migrate --env=prod --no-interaction

# start server
php -S 0.0.0.0:$PORT -t public
