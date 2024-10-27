<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Page\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::create([
            'name' => 'Wifi',
            'slug' => Str::slug('Wifi'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Servicios y Muebles',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Feature::create([
            'name' => 'Heladera',
            'slug' => Str::slug('Heladera'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Servicios y Muebles',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Feature::create([
            'name' => 'Amueblado',
            'slug' => Str::slug('Amueblado'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Servicios y Muebles',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Feature::create([
            'name' => 'TV',
            'slug' => Str::slug('TV'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Servicios y Muebles',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Feature::create([
            'name' => 'Horno',
            'slug' => Str::slug('Horno'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Servicios y Muebles',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Feature::create([
            'name' => 'Mascotas',
            'slug' => Str::slug('Mascotas'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Servicios y Muebles',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);




        Feature::create([
            'name' => 'Garage',
            'slug' => Str::slug('Garage'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Espacios',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Feature::create([
            'name' => 'Piscina',
            'slug' => Str::slug('Piscina'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Espacios',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Feature::create([
            'name' => 'Patio',
            'slug' => Str::slug('Patio'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Espacios',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);



        Feature::create([
            'name' => 'Zona Centrica',
            'slug' => Str::slug('Zona Centrica'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Zonas y Exteriores',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Feature::create([
            'name' => 'Excelente ubicacion',
            'slug' => Str::slug('Excelente ubicacion'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Zonas y Exteriores',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Feature::create([
            'name' => 'Calle de asfalto',
            'slug' => Str::slug('Calle de asfalto'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Zonas y Exteriores',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Feature::create([
            'name' => 'Calle con mejorado',
            'slug' => Str::slug('Calle con mejorado'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'category' => 'Zonas y Exteriores',
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
    }
}
