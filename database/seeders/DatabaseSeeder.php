<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Publisher;
use App\Models\Record;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users
        User::factory(10)->create();

        // Create 10 artists
        $artists = Artist::factory(10)->create();

        // Create 5 publishers
        $publishers = Publisher::factory(5)->create();

        // Loop through each publisher
        foreach ($publishers as $publisher) {
            // Create 3 albums for each publisher
            $albums = Album::factory(3)->create(['publisher_id' => $publisher->id]);

            // Loop through each album
            foreach ($albums as $album) {
                // Attach a random selection of 1 to 3 artists to each album
                $albumArtists = $artists->random(rand(1, 3));
                foreach ($albumArtists as $artist) {
                    $album->artists()->attach($artist->id, ['role' => 'Main Artist']);

                }

                // Create 10 records for each album
                $records = Record::factory(10)->create([
                    'album_id' => $album->id,
                    'publisher_id' => $publisher->id
                ]);

                // Loop through each record
                foreach ($records as $record) {
                    // Attach a random selection of 1 to 2 artists to each record
                    $recordArtists = $artists->random(rand(1, 2));
                    foreach ($recordArtists as $artist) {
                        $record->artists()->attach($artist->id, ['role' => 'Main Performer']);
                    }
                }
            }
        }
    }
}
