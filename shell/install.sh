#!/bin/bash -x

docker-compose up -d;

docker-compose run --rm composer install \
  && docker-compose run --rm composer dump-autoload \
  && docker-compose exec site php artisan migrate:fresh --seed \
  && docker-compose exec site php artisan vendor:publish --all \
  && docker-compose exec site php artisan storage:link -v \
  && docker-compose exec site php artisan cache:clear \
  && docker-compose exec site chmod -R 777 storage/ \
  && docker-compose run --rm npm install
