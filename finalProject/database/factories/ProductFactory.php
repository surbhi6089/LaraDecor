<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = "Product";
        return [
            'category_id' => Category::factory(),
            'title' => $title,
            'price' =>$this->faker->numberBetween(20,500),
            // 'image' =>$this->faker->imageUrl($width = 100, $height = 100)
        ];
    }
}
