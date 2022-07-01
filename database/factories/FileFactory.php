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
        $category = Category::all()->random()->id;

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
            if (!Storage::exists('public/photos/'.$size)) {
                Storage::makeDirectory('public/photos/'.$size);
            }
        }

        return [
            'url_th' => $this->faker->imageUrl(165, 165),
            'url_md' => $this->faker->imageUrl(820, 820),
            'url_lg' => $this->faker->imageUrl(1280, 1280),
            'user_id' => $user,
            'category_id' => $category,
        ];
    }
}
