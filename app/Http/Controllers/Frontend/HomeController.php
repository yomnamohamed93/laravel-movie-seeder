<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TopRatedMovie;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $movies_genres_array= $movies_data_array=array();
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
            //delete existing records
            DB::table('top_rated_movies')->truncate();
            TopRatedMovie::insert($movies_data_array);
            //delete existing movies genres relations data
            DB::table('genre_top_rated_movie')->truncate();
            DB::table('genre_top_rated_movie')->insert($movies_genres_array);

        }
    }

}
