#!/bin/bash

docker-compose run --rm --user "$(id -u):$(id -g)" php composer "$@"