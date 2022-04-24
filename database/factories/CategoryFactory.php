<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name =  'category '.uniqid();
        return [
            'name' => $name,
            'slug' => Str::slug($name,'-'),
            'image' => 'images/no_image.png',
            'status' => $this->faker->numberBetween(0,1),
            'parent_id' => $this->faker->randomDigit(),
        ];
    }
}
