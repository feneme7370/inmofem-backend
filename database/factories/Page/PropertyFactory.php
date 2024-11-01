<?php

namespace Database\Factories\Page;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Genera un título con 3 palabras
            'slug' => Str::slug($this->faker->sentence(3)), // Convierte el título en un slug
            'description' => $this->faker->paragraph, // Genera una descripción de párrafo
            'price' => $this->faker->randomFloat(2, 30000, 150000), // Asegura un precio con decimales
            'address' => $this->faker->streetAddress, // Genera una dirección de calle
            'city' => $this->faker->city, // Genera un nombre de ciudad
            'country' => $this->faker->country, // Genera un nombre de país
            'bedrooms' => $this->faker->numberBetween(1, 5), // Número de habitaciones entre 1 y 5
            'bathrooms' => $this->faker->numberBetween(1, 3), // Número de baños entre 1 y 3

            'garage' => $this->faker->numberBetween(0,1),
            'yard' => $this->faker->numberBetween(0,1),
            'size' => $this->faker->randomFloat(1, 40, 200), // Genera un tamaño entre 40 y 200 m² con un decimal
            'uuid' => Str::uuid(),
            'status' => $this->faker->numberBetween(0,1),
            'is_send' => $this->faker->numberBetween(0,1),

            'send_at' => $this->faker->dateTimeBetween('2022-01-01', '2024-10-30'),

            'money_id' => $this->faker->numberBetween(1, 2), // ID de tipo de moneda
            'method_id' =>  $this->faker->numberBetween(1, 4), // ID de tipo de moneda,
            'property_type_id' =>  $this->faker->numberBetween(1, 7), // ID de tipo de moneda,
            'user_id' =>  2, // ID de tipo de moneda,
            'company_id' =>  2, // ID de tipo de moneda,
        ];
    }
}
