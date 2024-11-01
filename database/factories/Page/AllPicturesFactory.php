<?php

namespace Database\Factories\Page;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AllPicturesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'path_jpg' => 'sistem/img/img/1.jpg',
            'path_jpg_tumb' => 'sistem/img/img/1.jpg',
            'imageable_id' => $this->faker->numberBetween(1, 160),
            'imageable_type' => 'App\Models\Page\Property',
            'type' => 'image_cover',
            'uuid' => Str::uuid(),
        ];
    }
}
