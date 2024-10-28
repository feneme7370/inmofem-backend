<?php

namespace App\Livewire\Page\Company;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Page\Company;
use Livewire\WithFileUploads;
use App\Models\Page\Membership;
use Illuminate\Validation\Rule;
use App\Helpers\CrudInterventionImage;

class CompanyCreate extends Component
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
    $url,
    $description,
    $hero_description,
    $time_description,
    $short_description,
    $membership_id,
    $uuid,
    $status;

    public $image_cover, $image_logo, $image_qr; // imagenes nuevas
    public $imageCover, $imageLogo, $imageQr; // imagenes existentes

    // columna para actualizar todo el modelo
    public $tableColumns = [
        'name',
        'slug',
        'email',
        'address',
        'phone',
        'city',
        'country',
        'url',
        'description',
        'hero_description',
        'time_description',
        'short_description',
        'membership_id',
        'uuid',
        'status'
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
        'url' => ['nullable', 'url'],
        'description' => ['nullable', 'string'],
        'hero_description' => ['nullable', 'string'],
        'time_description' => ['nullable', 'string'],
        'short_description' => ['nullable', 'string', 'max:500'],
        'membership_id' => ['required', 'exists:memberships,id'],
        'status' => ['required', 'numeric'],
        'uuid' => ['nullable', 'string'],

        'image_cover' => ['nullable','image','mimes:jpeg,png,jpg,gif','max:3072'],
        'image_logo' => ['nullable','image','mimes:jpeg,png,jpg,gif','max:3072'],
        'image_qr' => ['nullable','image','mimes:jpeg,png,jpg,gif','max:3072'],
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
        'url' => 'enlace',
        'description' => 'descripción',
        'hero_description' => 'descripción principal',
        'time_description' => 'descripción de horarios',
        'short_description' => 'descripción corta',
        'membership_id' => 'membresía',
        'status' => 'estado',
        'uuid' => 'clave unica',

        'image_cover' => 'imagen de portada',
        'image_logo' => 'imagen de logo',
        'image_qr' => 'imagen de qr',
    ];

    /********************************************* MODULO INICIO *********************************************/

    // montar
    public function mount($companyId = null)
    {
        // si estamos editando
        if ($companyId) {
            
            $this->company = Company::findOrFail($companyId);

            $this->authorize('update', $this->company); 

            // Cargar los datos para edición
            $this->name = $this->company->name;
            $this->slug = $this->company->slug;
            $this->email = $this->company->email;
            $this->address = $this->company->address;
            $this->phone = $this->company->phone;
            $this->city = $this->company->city;
            $this->country = $this->company->country;
            $this->url = $this->company->url;
            $this->description = $this->company->description;
            $this->hero_description = $this->company->hero_description;
            $this->time_description = $this->company->time_description;
            $this->short_description = $this->company->short_description;
            $this->membership_id = $this->company->membership_id;
            $this->uuid = $this->company->uuid;
            $this->status = $this->company->status  ? true : false;

        // si estamos creando
        }else{
            $this->company = null;
            $this->authorize('create', Company::class); 
            $this->status = 1;
        }
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
                'uuid' => Str::uuid(),
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
        if($this->image_qr){
            $this->uploadImage($this->image_qr, 'image_qr');
        }
    }

    /********************************************* MODULO SAVE *********************************************/
    // boton de guardar o editar
    public function save() {

        // poner datos automaticos
        $this->slug = Str::slug($this->uuid .'-'.$this->name);
        $this->status = $this->status ? 1 : 0;
        
        // validar datos
        $this->validate();

        // si editamos
        if( isset( $this->company['id'])) {

            // actualizar datos
            $this->company->update(
                $this->only($this->tableColumns)
            );

        // si creamos
        } else {
            // crear empresa y obtener datos
            $this->uuid = Str::uuid();
            $this->company = Company::create(
                $this->only($this->tableColumns)
            );

        }
        
        $this->saveImages();

        // limpiar variables
        $this->reset(['company']);
        $this->resetProperties();
                    
        // mensaje exitoso
        session()->flash('messageSuccess', 'Datos guardados correctamente.');
        $this->dispatch('toastrSuccess', 'Datos guardados correctamente');

        // redireccionar
        $this->redirect(route('companies.index'));
    }
    
    public function render()
    {
        $memberships = Membership::select('id', 'name')->get();
        
        $this->imageCover = $this->company ? $this->company->allPictures()->where('type', 'image_cover')->first() : false;
        $this->imageLogo = $this->company ? $this->company->allPictures()->where('type', 'image_logo')->first() : false;
        $this->imageQr = $this->company ? $this->company->allPictures()->where('type', 'image_qr')->first() : false;

        return view('livewire.page.company.company-create',compact(
            'memberships',
        ));
    }
}
