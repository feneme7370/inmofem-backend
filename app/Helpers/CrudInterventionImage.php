<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CrudInterventionImage
{
   
    // subir imagen al crear producto o editar al reemplazar
    public static function uploadImage($new_file_image, $type){
        if($new_file_image){

            $path = 'archives/images/'.Auth::user()->company_id.'/'.$type.'/';
    
            // Verificar si la carpeta existe, si no, crearla
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
    
            // crear nombres
            $filename = Auth::user()->company_id .'_'. Auth::user()->id .'_'.now()->format('Y-m-d').'_'.Str::random(5). '.jpg';
            $filename_tumb = Auth::user()->company_id .'_'. Auth::user()->id .'_'.now()->format('Y-m-d').'_'.Str::random(5). '_tumb.jpg';
    
            $manager = new ImageManager(new Driver());
    
            // read image from file system
            $manager->read($new_file_image)->scale(width: 800)->toJpeg(90)->save($path . $filename);
            $manager->read($new_file_image)->scale(width: 300)->toJpeg(90)->save($path . $filename_tumb);
    
            return [
                'jpg' => [
                    'image_jpg' => $path . $filename,
                    'tumb_jpg' => $path . $filename_tumb,
                    'path_jpg' => $path, 
                    'name_jpg' => $filename,
                    'type' => $type,
                ]
            ];
        }
    }

    // eliminar imagen
    public static function deletePicture($file_image_to_delete){
        if(File::exists($file_image_to_delete)){
            File::delete($file_image_to_delete);
        }
    }
    // eliminar imagen y tumb
    public static function deletePictureAndTumb($image, $tumb){
        if(File::exists($image)){
            File::delete($image);
        }
        if(File::exists($tumb)){
            File::delete($tumb);
        }
    }

    // eliminar imagen y tumb
    public static function rotatePicture($image, $tumb, $type){
        if(File::exists($image) && File::exists($tumb)){

            $path = 'archives/images/'.Auth::user()->company_id.'/'.$type.'/';
    
            // Verificar si la carpeta existe, si no, crearla
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
    
            // crear nombres
            $filename = Auth::user()->company_id .'_'. Auth::user()->id .'_'.now()->format('Y-m-d').'_'.Str::random(5). '.jpg';
            $filename_tumb = Auth::user()->company_id .'_'. Auth::user()->id .'_'.now()->format('Y-m-d').'_'.Str::random(5). '_tumb.jpg';

            $manager = ImageManager::gd();

            // read image from file system
            $manager->read($image)->rotate(-90)->save($path . $filename);
            $manager->read($tumb)->rotate(-90)->save($path . $filename_tumb);
            
            CrudInterventionImage::deletePictureAndTumb($image, $tumb);

            return ['image_jpg' => $path . $filename, 'tumb_jpg' => $path . $filename_tumb];
        }
    }

}