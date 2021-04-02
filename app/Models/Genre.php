<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    // protected $primaryKey = 'id';
    protected $fillable = array(
        'id',
        'name'
    );
}
