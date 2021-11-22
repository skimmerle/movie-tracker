<?php

namespace App\Providers;

use Skimmerle\MovieApi\Clients\OpenMovieClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app
            ->when(OpenMovieClient::class)
            ->needs('$apiKey')
            ->give($_ENV['OPEN_MOVIE_API_KEY']);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
