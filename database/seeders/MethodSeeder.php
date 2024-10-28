<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Page\Method;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Method::create([
            'name' => 'Alquiler',
            'slug' => Str::slug('Alquiler'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'uuid' => Str::uuid(),
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Method::create([
            'name' => 'Venta',
            'slug' => Str::slug('Venta'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'uuid' => Str::uuid(),
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Method::create([
            'name' => 'Arrendamiento',
            'slug' => Str::slug('Arrendamiento'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'uuid' => Str::uuid(),
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Method::create([
            'name' => 'Permuta',
            'slug' => Str::slug('Permuta'),
            'description' => 'Descripcion sobre el tipo de caracteristica',
            'uuid' => Str::uuid(),
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
    }
}
