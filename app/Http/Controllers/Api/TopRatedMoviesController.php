<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TopRatedMovieResource;
use App\Models\TopRatedMovie;
use Illuminate\Support\Facades\DB;

class TopRatedMoviesController extends Controller
{
    public function all(Request $request){
        $query=TopRatedMovie::query();
        DB::enableQueryLog();
        if($request->has("genre_id") && $request->genre_id){
            $query->whereHas('genres', function($q) use ($request){
                $q->where('genres.id', $request->genre_id);
            });
        }
        // $query->orderBy('vote_average','desc')->paginate(20);
        // dd(($request->popular));
        if($request->popular){
            $query->orderBy('popularity',$request->popular);
        }
        if($request->rating){
            $query->orderBy('vote_average',$request->rating);
        }
        return TopRatedMovieResource::collection($query->paginate(20));
    }
}
