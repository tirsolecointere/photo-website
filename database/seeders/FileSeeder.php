<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\File;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = File::factory(15)->create();

        foreach ($file as $file) {
            $file->categories()->sync([rand(1,2), rand(3,5)]);
        }
    }
}
