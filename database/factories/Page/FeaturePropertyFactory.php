<?php

namespace Database\Factories\Page;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FeaturePropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'feature_id' => $this->faker->numberBetween(1, 10), // ID feature
            'property_id' => $this->faker->numberBetween(1, 160), // ID property
        ];
    }
}
