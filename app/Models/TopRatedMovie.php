<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopRatedMovie extends Model
{
    protected $orderBy = 'vote_average';
    protected $casts = [
        'adult' => 'boolean',
        'popularity' => 'float',
        'vote_average' => 'float',

    ];
    protected $dates = ['release_date'];
    protected $fillable = array(
        'id',
        'title',
        'original_title',
        'overview',
        'poster_path',
        'backdrop_path',
        'popularity',
        'vote_average',
        'vote_count',
        'release_date',
        'adult',
        'video',
        'original_language'
    );
    public function genres()
    {
        return $this->belongsToMany('App\Models\Genre', 'genre_top_rated_movie','movie_id','genre_id');
    }
}
