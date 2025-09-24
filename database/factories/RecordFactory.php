<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(4, true),
            'album_id' => Album::factory(),
            'publisher_id' => Publisher::factory(),
            'track_number' => $this->faker->numberBetween(1, 20),
            'duration_ms' => $this->faker->numberBetween(120000, 600000), // 2-10 minutes in milliseconds
            'is_explicit' => $this->faker->boolean(20), // 20% chance of being explicit
        ];
    }
}
