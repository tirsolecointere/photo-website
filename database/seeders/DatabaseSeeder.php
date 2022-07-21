<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('photos');
        Storage::makeDirectory('photos');

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            FileSeeder::class,
        ]);
    }
}
