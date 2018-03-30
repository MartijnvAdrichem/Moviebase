<?php

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
        factory(App\Actor::class, 250)->create()->each(function($actor){

            //$user->posts()->save(factory(App\Post::class)->make());
            $actor->save();
        });
    }
}
