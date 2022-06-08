<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbilitiesTableSeeder extends Seeder
{
    protected $abilities =[
        'posts.create' => 'Can create new posts.',
        'posts.update' => 'Can update posts.',
        'posts.delete' => 'Can delete posts.',
        'categories.create' => 'Can create new category.',
        'categories.update' => 'Can update category.',
        'categories.delete' => 'Can delete category.',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->abilities as $code =>$name){
            DB::table('abilities')->insert([
                'code' => $code,
                'name' => $name,
            ]);
        }

        
    }
}
