#!/usr/bin/env bash

docker-compose build
docker-compose run --rm php-fpm composer install
docker-compose run --rm php-fpm composer check