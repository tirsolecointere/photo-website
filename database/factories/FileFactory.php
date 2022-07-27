<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::first()->id;

        $image_sizes = [
            'th' => [
                'width'     => 165,
                'height'    => 165,
            ],
            'md' => [
                'width'     => 820,
                'height'    => 820,
            ],
            'lg' => [
                'width'     => 1280,
                'height'    => 1280,
            ],
        ];

        foreach ($image_sizes as $size => $value) {
            if (!Storage::exists('photos/'.$size)) {
                Storage::makeDirectory('photos/'.$size);
            }
        }

        return [
            'url_th' => 'photos/th/' . $this->faker->image('public/storage/photos/th', 165, 165, null, false),
            'url_md' => 'photos/md/' . $this->faker->image('public/storage/photos/md', 820, 820, null, false),
            'url_lg' => 'photos/lg/' . $this->faker->image('public/storage/photos/lg', 1200, 1200, null, false),
            'img_lg_width' => 1200,
            'img_lg_height' => 1200,
            'user_id' => $user,
        ];
    }
}
