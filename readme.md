# Laravel Movies Seeder Task
Laravel version "5.8".

### Installation and configuration steps

 <pre> git clone git@github.com:yomnamohamed93/laravel-movie-seeder.git </pre>   
 <pre>  cd laravel-movie-seeder </pre>
 <pre>  composer install </pre>
 <pre>  cp .env.example .env </pre>
 <pre> php artisan key:generate </pre>
 In .env file change the value of **QUEUE_CONNECTION** to **database** . </br>

Run the migrations and seeding (**Please note to set database connection in .env file**)
 <pre> php artisan migrate </pre>  
Seed the genres (movies categories) from the external API
  <pre> php artisan db:seed </pre>

Start the local development server

   <pre> php artisan serve </pre>
   
## To run the scheduler that fetch the movies from the external API
The scheduler is set to run every 5 minutes. </br>
<pre> php artisan schedule run </pre>

# Testing API

Top Rated Movies api can now be accessed through **GET** request at: 

    http://localhost:8000/api/topRatedMovies
    
- No paramters are required for this api.</br> </br>
***All the following parameters is sent as query string parameters***. </br>
- Use **page** parameter to paginate.
- Default page size is set to **20** , you can change it by sending your desired value as a parameter called **perPage** . 
- You can filter by category using parameter called **genre_id** .
- You can sort the movies by rating using parameter called **rating** the value should **asc** or **desc**.
- You can sort the movies by popularity using parameter called **popular** the value should **asc** or **desc**.
