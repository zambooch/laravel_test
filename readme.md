## Start project

## скопируем файл окружения .env 
copy .env.example to .env
## выполним команду
docker-compose up -d
## выполним команды внутри контейнера php
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan optimize
docker-compose exec app php artisan migrate
##установим зависимости composer
composer install