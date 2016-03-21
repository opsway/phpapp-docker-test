#!/usr/bin/env bash

# exit on error
set -e

# cleanup from previous build
PHP_IMAGE=`docker build -q ./docker/php`

PHP="docker run -i --rm
       -v $(pwd):/app
       -w /app
       ${PHP_IMAGE}"

${PHP} composer install -o

# pre-build checks
# code style
${PHP} composer check

# todo remove dev dependencies

docker build -t phpapp/php-fpm -f ./docker/php-fpm-prod/Dockerfile .
docker build -t phpapp/nginx -f ./docker/nginx-prod/Dockerfile .

#docker tag phpapp/php-fpm hub.opsway.com:5000/phpapp/php-fpm
#docker tag phpapp/nginx hub.opsway.com:5000/phpapp/nginx
