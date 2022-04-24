<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name =  'product_SP'.uniqid();
        return [
            'name' => $name,
            'price' => $this->faker->randomDigit(),
            'image' => 'images/no_image.png',
            'description' => $this->faker->text(),
            'slug' => Str::slug($name,'-'),
            'status' => $this->faker->numberBetween(0,1),
            'category_id' => $this->faker->randomDigit(),
        ];
    }
}
