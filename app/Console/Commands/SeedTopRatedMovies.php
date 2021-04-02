<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TopRatedMovie;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
class SeedTopRatedMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'topRatedMovies:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeding 100 record from Top Rated Movies External API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $movies_data_array=$movies_genres_array=array();
        //we need to seed 100 record, each page has 20 item so we will get items from page 1 to 5
        $page = 1;
        while($page <= 5) {
            $response = $client->request('GET', 'movie/top_rated',[
                'query' => ['api_key'=>'b5ec8458089933b3f72e79d12646c0e4','page'=>$page]
            ]);
            $decoded_movies_data=json_decode($response->getBody()->getContents());
            foreach($decoded_movies_data->results as $item){
                $movies_data_array[]=array('id'=>$item->id,
                'title'=>$item->title,
                'original_title'=>$item->original_title,
                'overview'=>$item->overview,
                'poster_path'=>$item->poster_path,
                'backdrop_path'=>$item->backdrop_path,
                'popularity'=>$item->popularity,
                'vote_average'=>$item->vote_average,
                'vote_count'=>$item->vote_count,
                'release_date'=>$item->release_date,
                'adult'=>$item->adult,
                'video'=>$item->video,
                'original_language'=>$item->original_language);
                foreach($item->genre_ids as $genre_id){
                    $movies_genres_array[]=array('genre_id'=>$genre_id,'movie_id'=>$item->id);
                }

            }
            $page++;
        }


        // dd($movies_data_array);

        if(count($movies_data_array)==100){
            //delete existing movies data
            DB::table('top_rated_movies')->truncate();
            //insert movies data
            TopRatedMovie::insert($movies_data_array);
            //delete existing movies genres relations data
            DB::table('genre_top_rated_movie')->truncate();
            //insert movies genres relations data
            DB::table('genre_top_rated_movie')->insert($movies_genres_array);
            echo 'Successfully seeded\n';
        }
        echo 'Failed\n';
    }
}
