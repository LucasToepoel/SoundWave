<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'genre' => $this->faker->randomElement([
                'Rock',
                'Pop',
                'Hip Hop',
                'Jazz',
                'Classical',
                'Electronic',
                'Country',
                'Blues',
                'Folk',
                'Reggae'
            ]),
            'bio' => $this->faker->paragraph(3),
            'country' => $this->faker->country(),
        ];
    }
}
