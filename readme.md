# Laravel Movies Seeder Task

----------

## Installation and configuration steps

   
<pre> git clone git@github.com:yomnamohamed93/laravel-movie-seeder.git </pre>
    
<pre>  cd laravel-movie-seeder </pre>
<pre>  composer install </pre>
<pre>  cp .env.example .env </pre>
<pre> php artisan key:generate </pre>
   

Run the database migrations and seeding (**Please note to set database connection in .env file**)

   <pre><pre> php artisan migrate </pre>
   <pre> php artisan db:seed </pre>

Start the local development server

  <pre> php artisan serve </pre>

You can now access the server at http://localhost:8000

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

# Testing API

The api can now be accessed at

    http://localhost:8000/api
