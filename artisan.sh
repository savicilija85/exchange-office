#!/bin/bash

docker-compose run --rm --user "$(id -u):$(id -g)" php php /var/www/html/artisan "$@"
