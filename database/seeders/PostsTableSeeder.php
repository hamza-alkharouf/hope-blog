<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str; 
use \App\Models\Post;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        Post::create([
            'title' => 'Post Title',
            'slug' => Str::slug('Post Title'),
            'content' => 'Sample post content. Sample post content.',
            'category_id' => 1,
            'user_id'	 => 1,
            'status' => 'draft',

        ]);*/
        Post::factory(5)->create();
    }
}
