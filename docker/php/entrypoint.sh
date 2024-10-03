#!/bin/bash
set -e
composer install --no-progress --no-interaction
php -d variables_order=EGPCS artisan octane:start --server=roadrunner --host=0.0.0.0 --rpc-port=6001 --port=80
