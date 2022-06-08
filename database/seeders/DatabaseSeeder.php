<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(1)->create();
        //Category::factory(5)->create();
        //Tag::factory(10)->create();

        //dont need make "use" because it is in the same namespace
         $this->call([
        //     PostsTableSeeder::class
        AbilitiesTableSeeder::class
         ]);
    }
}
