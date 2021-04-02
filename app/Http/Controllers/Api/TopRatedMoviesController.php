<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TopRatedMovieResource;
use App\Models\TopRatedMovie;

class TopRatedMoviesController extends Controller
{
    public function all(Request $request){
        return TopRatedMovieResource::collection(TopRatedMovie::orderBy('vote_average','desc')->paginate(20));
    }
}
