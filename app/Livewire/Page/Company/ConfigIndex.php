<?php

namespace App\Livewire\Page\Company;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Page\Company;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Helpers\CrudInterventionImage;
use Illuminate\Support\Facades\Auth;

class ConfigIndex extends Component
{
    /********************************************* MODULO SUBIR ARCHIVOS *********************************************/
    // subir archivos en livewire
    use WithFileUploads;

    // property del modelo
    public $company;

    // properties models
    public 
    $name,
    $slug,
    $email,
    $address,
    $phone,
    $city,
    $country,
    $description,
    $hero_description,
    $time_description,
    $short_description,
    $uuid;

    public $image_cover, $image_logo; // imagenes nuevas
    public $imageCover, $imageLogo; // imagenes existentes

    // columna para actualizar todo el modelo
    public $tableColumns = [
        'name',
        'slug',
        'email',
        'address',
        'phone',
        'city',
        'country',
        'description',
        'hero_description',
        'time_description',
        'short_description',
    ];

    /********************************************* MODULO RULES *********************************************/
    // Reglas de validación
    public function rules(){
        return [
        'name' => ['required', 'string', 'max:255'],
        'slug' => ['required', 'string', 'max:255', Rule::unique('companies')->ignore($this->company)],
        'email' => ['required', 'email', 'max:255', Rule::unique('companies')->ignore($this->company)],
        'address' => ['nullable', 'string', 'max:255'],
        'phone' => ['nullable', 'string', 'max:20'],
        'city' => ['nullable', 'string', 'max:255'],
        'country' => ['nullable', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'hero_description' => ['nullable', 'string'],
        'time_description' => ['nullable', 'string'],
        'short_description' => ['nullable', 'string', 'max:500'],

        'image_cover' => ['nullable','image','mimes:jpeg,png,jpg,gif','max:3072'],
        'image_logo' => ['nullable','image','mimes:jpeg,png,jpg,gif','max:3072'],
    ];}

    // Reglas de validación en forma de array
    protected $validationAttributes = [
        'name' => 'nombre',
        'slug' => 'slug',
        'email' => 'correo electrónico',
        'address' => 'dirección',
        'phone' => 'teléfono',
        'city' => 'ciudad',
        'country' => 'país',
        'description' => 'descripción',
        'hero_description' => 'descripción principal',
        'time_description' => 'descripción de horarios',
        'short_description' => 'descripción corta',

        'image_cover' => 'imagen de portada',
        'image_logo' => 'imagen de logo',
    ];

    /********************************************* MODULO INICIO *********************************************/

    // montar
    public function mount()
    {
        // si estamos editando

        $this->company = Company::findOrFail(Auth::user()->company_id);

        $this->authorize('updateUser', $this->company); 

        // Cargar los datos para edición
        $this->name = $this->company->name;
        $this->slug = $this->company->slug;
        $this->email = $this->company->email;
        $this->address = $this->company->address;
        $this->phone = $this->company->phone;
        $this->city = $this->company->city;
        $this->country = $this->company->country;
        $this->description = $this->company->description;
        $this->hero_description = $this->company->hero_description;
        $this->time_description = $this->company->time_description;
        $this->short_description = $this->company->short_description;
        $this->uuid = $this->company->uuid;
    }

    /********************************************* MODULO UTILIDADES *********************************************/

    // resetear variables
    public function resetProperties() {
        $this->resetErrorBag();
        $this->reset($this->tableColumns);
    }

    /********************************************* MODULO IMAGENES *********************************************/
    // eliminar imagen
    public function deleteImage($id, $type){
            $data = Company::find($id); // buscar dato del modelo por id
            $to_delete = $data->allPictures->where('type', $type)->first(); // datos de path a borrar
    
            if($to_delete){ // pasar los path de las imagenes a borrar y tambien eliminar registro
                CrudInterventionImage::deletePictureAndTumb($to_delete->path_jpg, $to_delete->path_jpg_tumb);
                $to_delete->delete();
            }
    }

    // rotar imagen
    public function rotateImage($id, $type){
            $data = Company::find($id); // buscar dato del modelo por id
            $to_rotate = $data->allPictures->where('type', $type)->first(); // datos de path a rotar
            
            if($to_rotate){ // pasar los path de las imagenes a rotar y tambien actualizar registro anterior
                $imageRotated = CrudInterventionImage::rotatePicture($to_rotate->path_jpg, $to_rotate->path_jpg_tumb, $to_rotate->type);
                
                $data->allPictures->where('type', $type)->first()->update(
                    ['path_jpg' => $imageRotated['image_jpg'], 'path_jpg_tumb' => $imageRotated['tumb_jpg']]
                );
            }
    }

    // subir imagen
    public function uploadImage($image, $type){
        if($this->company){
            $this->deleteImage($this->company->id, $type);

            $dataImage = CrudInterventionImage::uploadImage($image, $type); // guardar nuevas imagenes y actualizar registros
    
            $this->company->allPictures()->create([
                'path_jpg' => $dataImage['jpg']['image_jpg'],
                'path_jpg_tumb' => $dataImage['jpg']['tumb_jpg'],
                'type' => $dataImage['jpg']['type'],
            ]);
        }
    }

    public function saveImages(){
        // guardar imagenes
        if($this->image_cover){
            $this->uploadImage($this->image_cover, 'image_cover');
        }
        if($this->image_logo){
            $this->uploadImage($this->image_logo, 'image_logo');
        }
    }

    /********************************************* MODULO SAVE *********************************************/
    // boton de guardar o editar
    public function save() {

        // poner datos automaticos
        $this->slug = Str::slug($this->uuid .'-'. $this->name);

        // validar datos
        $this->validate();

        // volver a comprobar
        $this->authorize('updateUser', $this->company); 
        // actualizar datos
        $this->company->update(
            $this->only($this->tableColumns)
        );
        
        $this->saveImages();

        // limpiar variables
        $this->reset(['company']);
        $this->resetProperties();
                    
        // mensaje exitoso
        session()->flash('messageSuccess', 'Datos guardados correctamente.');
        $this->dispatch('toastrSuccess', 'Datos guardados correctamente');

        // redireccionar
        $this->redirect(route('dashboard.index'));
    }
    

    public function render()
    {
        $this->imageCover = $this->company ? $this->company->allPictures()->where('type', 'image_cover')->first() : false;
        $this->imageLogo = $this->company ? $this->company->allPictures()->where('type', 'image_logo')->first() : false;
        
        return view('livewire.page.company.config-index');
    }
}
