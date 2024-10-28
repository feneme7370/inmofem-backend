<?php

namespace Database\Seeders;

use App\Models\Page\Money;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Money::create([
            'name' => 'Peso Argentino',
            'signo' => '$',
            'slug' => Str::slug('Peso Argentino'),
            'description' => 'Descripcion sobre el tipo de moneda',
            'uuid' => Str::uuid(),
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Money::create([
            'name' => 'Dolar Estadounidense',
            'signo' => 'USD',
            'slug' => Str::slug('Dolar Estadounidense'),
            'description' => 'Descripcion sobre el tipo de moneda',
            'uuid' => Str::uuid(),
            'status' => 1,
            'user_id' => 1,
            'company_id' => 1,
        ]);


    }
}
