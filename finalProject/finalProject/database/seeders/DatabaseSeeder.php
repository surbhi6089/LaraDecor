<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
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

        $category = Category::factory()->create([
            'name' => "Rugs/Carpets",
            'slug' => "rugs"
        ]);

        Product::factory(10)->create([
            'category_id' => $category->id
        ]);

        $category = Category::factory()->create([
            'name' => "Paintings",
            'slug' => "paintings"
        ]);

        Product::factory(10)->create([
            'category_id' => $category->id
        ]);

        $category = Category::factory()->create([
            'name' => "Statues",
            'slug' => "statues"
        ]);
        Product::factory(10)->create([
            'category_id' => $category->id
        ]);

        $category = Category::factory()->create([
            'name' => "Wall Decor",
            'slug' => "wall decor"
        ]);

        Product::factory(10)->create([
            'category_id' => $category->id
        ]);

        User::factory(30)->create();
    }
}
