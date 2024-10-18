#!/bin/bash
set -e
composer install --no-progress --no-interaction
echo "OCTANE_WORKERS: ${OCTANE_WORKERS}" 
echo ${OCTANE_WORKERS} 
echo "OCTANE_MAX_REQUESTS: ${OCTANE_MAX_REQUESTS}" 
echo ${OCTANE_MAX_REQUESTS} 
php artisan octane:start --server=roadrunner --host=0.0.0.0 --rpc-port=6001 --port=80 --workers=${OCTANE_WORKERS} --max-requests=${OCTANE_MAX_REQUESTS}
