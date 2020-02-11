#!/bin/bash

echo "Starting entrypoint.sh ..."
echo "======================="
echo "Installing dependencies"
echo "======================="
composer install

echo "======================="
echo "Generating app key"
echo "======================="
php artisan key:generate

echo "======================="
echo "Running migrations..."
echo "======================="
php artisan migrate

echo "======================="
echo "Starting PHP FPM"
echo "======================="
php-fpm

echo "======================="
echo "=======  OK  =========="
echo "======================="