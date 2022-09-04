#!/bin/bash

mkdir -p docker/logs/cron
touch docker/logs/cron/cron.log
mkdir -p docker/logs/nginx
touch docker/logs/nginx/access.log
touch docker/logs/nginx/errors.log
mkdir -p docker/composer_cache
mkdir -p docker/npm_cache
cp .env.example .env
