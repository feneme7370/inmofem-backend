<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Page\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'InmoFem',
            'slug' => Str::slug('InmoFem'),
            'email' => 'inmofem@gmail.com',
            'phone' => '2396513953',
            'address' => 'Arenales 356',
            'city' => 'Carlos Casares, Bs. As.',
            'country' => 'Argentina',
            'url' => 'inmofem.femaser.com',
            'short_description' => 'Veni y pasala genial',
            'hero_description' => 'Todos las propiedades',
            'time_description' => 'Lunes a viernes',
            'description' => 'Accede con el codigo QR y podras ver tu menu con todos tus productos y categorias. ',
            'uuid' => Str::uuid(),
            'status' => '1',
            'membership_id' => '1',
        ]);
        Company::create([
            'name' => 'PropMar',
            'slug' => Str::slug('PropMar'),
            'email' => 'marascofederico95@gmail.com',
            'phone' => '2396513953',
            'address' => 'Arenales 356',
            'city' => 'Carlos Casares, Bs. As.',
            'country' => 'Argentina',
            'url' => 'propmar.femaser.com',
            'short_description' => 'Veni y pasala genial',
            'hero_description' => 'Todos las propiedades',
            'time_description' => 'Lunes a viernes',
            'description' => 'Accede con el codigo QR y podras ver tu menu con todos tus productos y categorias. ',
            'uuid' => Str::uuid(),
            'status' => '1',
            'membership_id' => '2',
        ]);
    }
}