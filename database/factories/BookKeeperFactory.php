<?php

namespace Database\Factories;

use App\Models\BookKeeper;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookKeeperFactory extends Factory
{
    protected $model = BookKeeper::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}

