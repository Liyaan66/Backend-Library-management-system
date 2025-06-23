<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BorrowBook>
 */
class BorrowBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 3),
            'book_id' => \App\Models\Book::factory(),
            'reader_id' => \App\Models\Reader::factory(),
            'bookkeeper_id' => \App\Models\BookKeeper::factory(),
            'borrowed_at' => $this->faker->date(),
            'returned_at' => $this->faker->optional()->date(),
        ];
    }
}
