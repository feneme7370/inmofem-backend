<?php

namespace Database\Seeders;

use App\Models\Page\AllPicture;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AllPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Recorre cada id de 1 a 160 y crea una imagen asociada
        foreach (range(1, 30) as $id) {
            AllPicture::create([
                'path_jpg' => 'sistem/img/img/1.jpg',
                'path_jpg_tumb' => 'sistem/img/img/1.jpg',
                'imageable_id' => $id,
                'imageable_type' => 'App\Models\Page\Property',
                'type' => 'image_cover',
                'uuid' => Str::uuid(),
            ]);
        }
        // // Recorre cada id de 1 a 160 y crea una imagen asociada
        foreach (range(31, 60) as $id) {
            AllPicture::create([
                'path_jpg' => 'sistem/img/img/2.jpg',
                'path_jpg_tumb' => 'sistem/img/img/2.jpg',
                'imageable_id' => $id,
                'imageable_type' => 'App\Models\Page\Property',
                'type' => 'image_cover',
                'uuid' => Str::uuid(),
            ]);
        }
        // // Recorre cada id de 1 a 160 y crea una imagen asociada
        foreach (range(61, 90) as $id) {
            AllPicture::create([
                'path_jpg' => 'sistem/img/img/3.jpg',
                'path_jpg_tumb' => 'sistem/img/img/3.jpg',
                'imageable_id' => $id,
                'imageable_type' => 'App\Models\Page\Property',
                'type' => 'image_cover',
                'uuid' => Str::uuid(),
            ]);
        }
        // // Recorre cada id de 1 a 160 y crea una imagen asociada
        foreach (range(91, 120) as $id) {
            AllPicture::create([
                'path_jpg' => 'sistem/img/img/4.jpg',
                'path_jpg_tumb' => 'sistem/img/img/4.jpg',
                'imageable_id' => $id,
                'imageable_type' => 'App\Models\Page\Property',
                'type' => 'image_cover',
                'uuid' => Str::uuid(),
            ]);
        }
        // // Recorre cada id de 1 a 160 y crea una imagen asociada
        foreach (range(121, 160) as $id) {
            AllPicture::create([
                'path_jpg' => 'sistem/img/img/5.jpg',
                'path_jpg_tumb' => 'sistem/img/img/5.jpg',
                'imageable_id' => $id,
                'imageable_type' => 'App\Models\Page\Property',
                'type' => 'image_cover',
                'uuid' => Str::uuid(),
            ]);
        }


        // // Recorre cada id de 1 a 160 y crea una imagen asociada
        foreach (range(1, 160) as $id) {
            AllPicture::create([
                'path_jpg' => 'sistem/img/img/a.jpg',
                'path_jpg_tumb' => 'sistem/img/img/a.jpg',
                'imageable_id' => $id,
                'imageable_type' => 'App\Models\Page\Property',
                'type' => 'image_additional',
                'uuid' => Str::uuid(),
            ]);
        }
        // // Recorre cada id de 1 a 160 y crea una imagen asociada
        foreach (range(1, 160) as $id) {
            AllPicture::create([
                'path_jpg' => 'sistem/img/img/b.jpg',
                'path_jpg_tumb' => 'sistem/img/img/b.jpg',
                'imageable_id' => $id,
                'imageable_type' => 'App\Models\Page\Property',
                'type' => 'image_additional',
                'uuid' => Str::uuid(),
            ]);
        }
        // // Recorre cada id de 1 a 160 y crea una imagen asociada
        foreach (range(1, 160) as $id) {
            AllPicture::create([
                'path_jpg' => 'sistem/img/img/c.jpg',
                'path_jpg_tumb' => 'sistem/img/img/c.jpg',
                'imageable_id' => $id,
                'imageable_type' => 'App\Models\Page\Property',
                'type' => 'image_additional',
                'uuid' => Str::uuid(),
            ]);
        }
        // // Recorre cada id de 1 a 160 y crea una imagen asociada
        foreach (range(1, 160) as $id) {
            AllPicture::create([
                'path_jpg' => 'sistem/img/img/d.jpg',
                'path_jpg_tumb' => 'sistem/img/img/d.jpg',
                'imageable_id' => $id,
                'imageable_type' => 'App\Models\Page\Property',
                'type' => 'image_additional',
                'uuid' => Str::uuid(),
            ]);
        }
        // // Recorre cada id de 1 a 160 y crea una imagen asociada
        foreach (range(1, 160) as $id) {
            AllPicture::create([
                'path_jpg' => 'sistem/img/img/e.jpg',
                'path_jpg_tumb' => 'sistem/img/img/e.jpg',
                'imageable_id' => $id,
                'imageable_type' => 'App\Models\Page\Property',
                'type' => 'image_additional',
                'uuid' => Str::uuid(),
            ]);
        }
    }
}