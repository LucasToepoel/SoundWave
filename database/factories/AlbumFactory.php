<?php

namespace Database\Factories;

use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'publisher_id' => Publisher::factory(),
            'release_date' => $this->faker->dateTimeBetween('-30 years', 'now'),
            'label' => $this->faker->randomElement([
                'Atlantic Records',
                'Columbia Records',
                'Universal Music',
                'Sony Music',
                'Warner Music',
                'Capitol Records',
                'Def Jam',
                'Interscope',
                'RCA Records',
                'Republic Records'
            ]),
            'cover_art_url' => $this->faker->imageUrl(500, 500, 'abstract', true),
        ];
    }
}
