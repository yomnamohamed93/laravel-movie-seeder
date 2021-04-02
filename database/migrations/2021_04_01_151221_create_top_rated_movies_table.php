<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopRatedMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('top_rated_movies', function (Blueprint $table) {
            $table->bigIncrements('record_id');
            $table->bigInteger('id');
            $table->string('title');
            $table->string('original_title');
            $table->text('overview');
            $table->string('poster_path');
            $table->string('backdrop_path');
            $table->decimal('popularity',8,3);
            $table->decimal('vote_average',2,1);
            $table->integer('vote_count');
            $table->date('release_date');
            $table->boolean('adult');
            $table->string('video');
            $table->string('original_language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_rated_movies');
    }
}
