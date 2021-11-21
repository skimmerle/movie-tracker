<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)
            ->create()
            ->each(function ($user) {
                //create 5 movies for each user
                Movie::factory(5)
                    ->create(['user_id' => $user->id]);
            });
    }
}
