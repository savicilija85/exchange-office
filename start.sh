#!/bin/bash

./up.sh
./npm.sh install
./composer.sh install
./artisan.sh migrate:fresh --seed
