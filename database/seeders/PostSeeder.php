<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('PRAGMA foreign_keys = OFF');
        Post::truncate();
        DB::statement('PRAGMA foreign_keys = ON');

        for ($i=0; $i < 20; $i++) { 
            $title = Str::random(20);
            $category_id = Category::inRandomOrder()->first()->id;
            Post::create( 
                [
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'description' => "Description $i",
                    'content' => "Content $i",
                    'posted' => rand(0, 1) ? "yes" : "no",
                    'category_id' => $category_id,
                ]
            );
        }
    }
}
