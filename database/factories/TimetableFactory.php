<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timetable>
 */
class TimetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bookkeeper_id' => \App\Models\BookKeeper::factory(),
            'date' => $this->faker->date(),
            'open_hour' => $this->faker->time('H:i'),
            'close_hour' => $this->faker->time('H:i'),
        ];
    }
}
