<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Page\Property;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::create([
            'title' => 'Casa grande',
            'slug' => Str::slug('Casa grande'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'price' => 15000.00,
            'address' => 'Arenales 356',
            'city' => 'Carlos Casares',
            'country' => 'Argentina',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'garage' => 1,
            'yard' => 1,
            'size' => 45.5,
            'uuid' => Str::uuid(),
            'status' => 1,

            'money_id' => 1,
            'method_id' => 1,
            'property_type_id' => 1,
            'user_id' => 2,
            'company_id' => 2,
        ]);
        Property::create([
            'title' => 'Departiamento',
            'slug' => Str::slug('Departiamento'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'price' => 15000.00,
            'address' => 'Arenales 356',
            'city' => 'Carlos Casares',
            'country' => 'Argentina',
            'bedrooms' => 1,
            'bathrooms' => 2,
            'garage' => 1,
            'yard' => 1,
            'size' => 45.5,
            'uuid' => Str::uuid(),
            'status' => 1,

            'money_id' => 2,
            'method_id' => 2,
            'property_type_id' => 2,
            'user_id' => 2,
            'company_id' => 2,
        ]);
        Property::create([
            'title' => 'Ph Grande',
            'slug' => Str::slug('Ph Grande'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'price' => 15000.00,
            'address' => 'Arenales 356',
            'city' => 'Carlos Casares',
            'country' => 'Argentina',
            'bedrooms' => 1,
            'bathrooms' => 2,
            'garage' => 1,
            'yard' => 1,
            'size' => 45.5,
            'uuid' => Str::uuid(),
            'status' => 1,

            'money_id' => 2,
            'method_id' => 2,
            'property_type_id' => 2,
            'user_id' => 2,
            'company_id' => 2,
        ]);
        Property::create([
            'title' => 'Local Comercial',
            'slug' => Str::slug('Local Comercial'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'price' => 15000.00,
            'address' => 'Arenales 356',
            'city' => 'Carlos Casares',
            'country' => 'Argentina',
            'bedrooms' => 1,
            'bathrooms' => 2,
            'garage' => 1,
            'yard' => 1,
            'size' => 45.5,
            'uuid' => Str::uuid(),
            'status' => 1,

            'money_id' => 2,
            'method_id' => 2,
            'property_type_id' => 2,
            'user_id' => 2,
            'company_id' => 2,
        ]);
        Property::create([
            'title' => 'Casa de dos pisos',
            'slug' => Str::slug('Casa de dos pisos'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'price' => 15000.00,
            'address' => 'Arenales 356',
            'city' => 'Carlos Casares',
            'country' => 'Argentina',
            'bedrooms' => 1,
            'bathrooms' => 2,
            'garage' => 1,
            'yard' => 1,
            'size' => 45.5,
            'uuid' => Str::uuid(),
            'status' => 1,

            'money_id' => 1,
            'method_id' => 1,
            'property_type_id' => 2,
            'user_id' => 2,
            'company_id' => 2,
        ]);
        Property::create([
            'title' => 'Terreno 10x32',
            'slug' => Str::slug('Terreno 10x32'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'price' => 15000.00,
            'address' => 'Arenales 356',
            'city' => 'Carlos Casares',
            'country' => 'Argentina',
            'bedrooms' => 1,
            'bathrooms' => 2,
            'garage' => 1,
            'yard' => 1,
            'size' => 45.5,
            'uuid' => Str::uuid(),
            'status' => 1,

            'money_id' => 1,
            'method_id' => 1,
            'property_type_id' => 2,
            'user_id' => 2,
            'company_id' => 2,
        ]);
    }
}