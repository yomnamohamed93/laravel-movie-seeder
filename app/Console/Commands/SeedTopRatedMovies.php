<?php

namespace App\Console\Commands;

use App\Jobs\SeedTopRatedMovies as JobsSeedTopRatedMovies;
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
        JobsSeedTopRatedMovies::dispatch();
    }
}
