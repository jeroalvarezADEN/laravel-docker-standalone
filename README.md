# laravel-docker-standalone

## Local workspace

### Starting

````bash
docker network create laravel-network

docker volume create --name mariadb_data
docker run -d --name mariadb \
    --env ALLOW_EMPTY_PASSWORD=yes \
    --env MARIADB_USER=bn_myapp \
    --env MARIADB_DATABASE=bitnami_myapp \
    --network laravel-network \
    --volume mariadb_data:/bitnami/mariadb \
    bitnami/mariadb:latest

docker build -t laravel .

docker run -it \
    --name laravel \
    -p 8000:8000 \
    --env DB_HOST=mariadb \
    --env DB_PORT=3306 \
    --env DB_USERNAME=bn_myapp \
    --env DB_DATABASE=bitnami_myapp \
    --network laravel-network \
    --volume ${PWD}/project:/app \
    laravel
````

### Access to app bash

````bash
docker exec -it laravel bash
````

If you like to run simultaneously the app and the bash, you need two terminals; 
or run the app in background with `docker run -d ...` and then run the bash with `docker exec -it laravel bash`.


## Extending the image

1. Create a new `Dockerfile` in your project with `FROM bitnami/laravel:latest`.
2. Run `docker build -t laravel .` to build the new image.
3. Run `docker run ...` replacing bitnami image by just `laravel`.


## Develop

**Q: How to upgrade laravel app on this repository?**

**A:** Just remove `project` folder and re-run `docker run -it ...` again. 


## Develop

### Guide
* Build container: docker-compose up --build -d
* Create migrations: php artisan make:migration create_customers_table
* Update migrations: php artisan make:migration add_custom_fields_to_customers_table --table=customers
* Sing to laravel container: docker exec -it laravel bash
* Execute Sedders: php artisan db:seed --class=CustomerSeeder
* Stop containe: docker stop laravel
* Delete container: docker rm laravel
* Delente and down al yml: docker-compose down
* List volume: docker volume ls
* Delete volume: docker volume rm laravel-docker-standalone_mariadb_data

Steap after buil
1. composer install
2. php artisan migrate
3. composer require filament/filament:"^3.2" -W
4. php artisan filament:install --panels
5. php artisan make:filament-user
7. php artisan make:filament-resource Customer --generate
8. php artisan make:filament-relation-manager DeviceRelationManager


steaps to build:
composer install 
composer require filament/filament:"^3.2" -W