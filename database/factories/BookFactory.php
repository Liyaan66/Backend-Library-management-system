<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'category_id' => \App\Models\Category::factory(),
            'image' => $this->faker->imageUrl(640, 480, 'books', true, 'Book Cover'), // ✅ just a fake URL
        ];
    }
}
