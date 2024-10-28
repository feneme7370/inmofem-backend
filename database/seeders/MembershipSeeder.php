<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Page\Membership;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Membership::create([
            'name' => 'Plate',
            'slug' => Str::slug('Plate'),
            'price' => 3000,
            'short_description' => 'Plan Basico',
            'description' => 'Si tienes pocos productos que ofrecer este es el tuyo',
            'max_properties' => 2,
            'max_images' => 2,
            'max_type_properties' => 1,
            'max_features' => 1,
            'max_tags' => 2,
            'max_suggestions' => 2,
            'uuid' => Str::uuid(),
            'status' => '1',
        ]);
        Membership::create([
            'name' => 'Gold',
            'slug' => Str::slug('Gold'),
            'price' => 5000,
            'short_description' => 'Plan Intermedio',
            'description' => 'Ideal para comercios, roticerias, y bares',
            'max_properties' => 100,
            'max_images' => 100,
            'max_type_properties' => 100,
            'max_features' => 100,
            'max_tags' => 100,
            'max_suggestions' => 100,
            'uuid' => Str::uuid(),
            'status' => '1',
        ]);
        Membership::create([
            'name' => 'Platinium',
            'slug' => Str::slug('Platinium'),
            'price' => 7000,
            'short_description' => 'Plan Completo',
            'description' => 'Util para mostrar toda la amplia gama de productos y variedades de tu comercio',
            'max_properties' => 100,
            'max_images' => 100,
            'max_type_properties' => 100,
            'max_features' => 100,
            'max_tags' => 100,
            'max_suggestions' => 100,
            'uuid' => Str::uuid(),
            'status' => '1',
        ]);
    }
}