<?php

use App\Models\Genre;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete existing records
        DB::table('genres')->truncate();

        //fetch genres data from themoviedb API
        $client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
        $genres_response = $client->request('GET', 'genre/movie/list?api_key=b5ec8458089933b3f72e79d12646c0e4&page=1');
        $decoded_genres_response=json_decode($genres_response->getBody());
        $genres_data_array=array();
        foreach($decoded_genres_response->genres as $item){
            $genres_data_array[]=array('id'=>$item->id,'name'=>$item->name);

        }
        Genre::insert($genres_data_array);


    }
}
