<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Page\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertyType::create([
            'name' => 'Terreno',
            'slug' => Str::slug('Terreno'),
            'description' => 'Descripcion sobre el tipo de propiedad',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        PropertyType::create([
            'name' => 'Casa',
            'slug' => Str::slug('Casa'),
            'description' => 'Descripcion sobre el tipo de propiedad',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        PropertyType::create([
            'name' => 'Departamento',
            'slug' => Str::slug('Departamento'),
            'description' => 'Descripcion sobre el tipo de propiedad',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        PropertyType::create([
            'name' => 'PH',
            'slug' => Str::slug('PH'),
            'description' => 'Descripcion sobre el tipo de propiedad',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        PropertyType::create([
            'name' => 'Local',
            'slug' => Str::slug('Local'),
            'description' => 'Descripcion sobre el tipo de propiedad',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        PropertyType::create([
            'name' => 'Galpon',
            'slug' => Str::slug('Galpon'),
            'description' => 'Descripcion sobre el tipo de propiedad',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        PropertyType::create([
            'name' => 'Campo',
            'slug' => Str::slug('Campo'),
            'description' => 'Descripcion sobre el tipo de propiedad',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
    }
}
