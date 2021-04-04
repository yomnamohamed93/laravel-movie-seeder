# Laravel Movies Seeder Task

----------

## Installation and configuration steps

    git clone git@github.com:yomnamohamed93/laravel-movie-seeder.git
    ----------------------------------------------------------------------
    
    cd laravel-movie-seeder

    composer install

    cp .env.example .env

    php artisan key:generate

Run the database migrations and seeding (**Please note to set database connection in .env file**)

    php artisan migrate
    php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| X-Requested-With 	| XMLHttpRequest   	|
| Optional 	| Authorization    	| Token {JWT}      	|

Refer the [api specification](#api-specification) for more info.
