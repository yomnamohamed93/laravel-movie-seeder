<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopRatedMovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'original_title' => $this->original_title,
            'overview' => $this->overview,
            'original_language' => $this->original_language,
            'poster_path' => $this->poster_path,
            'backdrop_path' => $this->backdrop_path,
            'popularity' => $this->popularity,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'release_date' => date("M d,Y", strtotime($this->release_date)),
            'adult' => $this->adult,
            'video' => $this->video?$this->video:false,
            'genres' => $this->genres()->pluck('name')->toArray(),
        ];
    }
}
