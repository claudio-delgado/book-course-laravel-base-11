<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('PRAGMA foreign_keys = OFF');
        Category::truncate();
        DB::statement('PRAGMA foreign_keys = ON');

        for ($i=0; $i < 20; $i++) { 
            Category::create( 
                [
                    'title' => "Category $i",
                    'slug' => "Slug $i",
                ]
            );
        }
    }
}
