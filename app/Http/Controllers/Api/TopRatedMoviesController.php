<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TopRatedMovieResource;
use App\Models\TopRatedMovie;

class TopRatedMoviesController extends Controller
{
    private $perPage;
    public function __construct(Request $request)
    {
        $this->perPage=request('perPage', 20);

    }
    public function all(Request $request){
        $query=TopRatedMovie::query();
        if($request->has("genre_id") && $request->genre_id){
            $query->whereHas('genres', function($q) use ($request){
                $q->where('genres.id', $request->genre_id);
            });
        }
        if($request->popular){
            $query->orderBy('popularity',$request->popular);
        }
        if($request->rating){
            $query->orderBy('vote_average',$request->rating);
        }
        $query=($request->perPage==-1)?$query->get():$query->paginate($this->perPage);
        return TopRatedMovieResource::collection($query);
    }
}
