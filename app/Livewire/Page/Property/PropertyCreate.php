<?php

namespace App\Livewire\Page\Property;

use Livewire\Component;
use App\Models\Page\Money;
use App\Models\Page\Method;
use Illuminate\Support\Str;
use App\Models\Page\Property;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Page\PropertyType;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CrudInterventionImage;
use App\Models\Page\AllPicture;
use App\Models\Page\Feature;
use App\Models\Page\Membership;

class PropertyCreate extends Component
{
        /********************************************* MODULO SUBIR ARCHIVOS *********************************************/
    // subir archivos en livewire
    use WithFileUploads;

    // property del modelo
    public $property;

    // properties models
    public 
    $title,
    $slug,
    $description,
    $price,

    $address,
    $city,
    $country,

    $bedrooms,
    $bathrooms,
    $garage,
    $yard,
    $size,

    $money_id,
    $method_id,
    $property_type_id,
    $company_id,
    $user_id,

    $status,
    $uuid;

    public $property_features = [];
    public $image_cover, $image_additional; // imagenes nuevas
    public $imageCover, $imageAdditional; // imagenes existentes

    // columna para actualizar todo el modelo
    public $tableColumns = [
        'title',
        'slug',
        'description',
        'price',
    
        'address',
        'city',
        'country',
    
        'bedrooms',
        'bathrooms',
        'garage',
        'yard',
        'size',
    
        'money_id',
        'method_id',
        'property_type_id',
        'company_id',
        'user_id',
    
        'status',
        'uuid',
    ];

    /********************************************* MODULO RULES *********************************************/
    // Reglas de validación
    public function rules(){
        return [
        'title' => ['required', 'string', 'max:255'],
        'slug' => ['required', 'string', 'max:255', Rule::unique('properties')->ignore($this->property)],
        'description' => ['nullable', 'string'],
        'price' => ['nullable', 'numeric'],

        'address' => ['nullable', 'string', 'max:255'],
        'city' => ['nullable', 'string', 'max:255'],
        'country' => ['nullable', 'string', 'max:255'],

        'bedrooms' => ['required', 'numeric'],
        'bathrooms' => ['required', 'numeric'],
        'garage' => ['required', 'numeric'],
        'yard' => ['required', 'numeric'],
        'size' => ['required', 'numeric'],

        'money_id' => ['required', 'exists:money,id'],
        'method_id' => ['required', 'exists:methods,id'],
        'property_type_id' => ['required', 'exists:property_types,id'],
        'company_id' => ['required', 'exists:companies,id'],
        'user_id' => ['required', 'exists:users,id'],
        'status' => ['required', 'numeric'],
        'uuid' => ['nullable', 'string'],
    ];}

    // Reglas de validación en forma de array
    protected $validationAttributes = [
        'title' => 'titulo',
        'slug' => 'slug',
        'description' => 'descripción',
        'price' => 'precio',

        'address' => 'dirección',
        'city' => 'ciudad',
        'country' => 'país',

        'bedrooms' => 'habitaciones',
        'bathrooms' => 'baños',
        'garage' => 'garage',
        'yard' => 'patio',
        'size' => 'metros cuadraros',

        'money_id' => 'moneda',
        'method_id' => 'metodo',
        'property_type_id' => 'tipo de propiedad',
        'company_id' => 'empresa',
        'user_id' => 'usuario',
        'status' => 'estado',
        'uuid' => 'clave unica',
    ];

    /********************************************* MODULO INICIO *********************************************/

    // montar
    public function mount($propertyId = null)
    {
        // si estamos editando
        if ($propertyId) {
            
            $this->property = Property::where('uuid', $propertyId)->first();

            $this->authorize('update', $this->property); 

            // Cargar los datos para edición
            $this->title = $this->property->title;
            $this->slug = $this->property->slug;
            $this->description = $this->property->description;
            $this->price = $this->property->price;

            $this->address = $this->property->address;
            $this->city = $this->property->city;
            $this->country = $this->property->country;
            
            $this->bedrooms = $this->property->bedrooms;
            $this->bathrooms = $this->property->bathrooms;
            $this->garage = $this->property->garage ? true : false;
            $this->yard = $this->property->yard ? true : false;
            $this->size = $this->property->size;

            $this->money_id = $this->property->money_id;
            $this->method_id = $this->property->method_id;
            $this->property_type_id = $this->property->property_type_id;
            $this->company_id = $this->property->company_id;
            $this->user_id = $this->property->user_id;

            $this->status = $this->property->status ? true : false;
            $this->uuid = $this->property->uuid;

            $this->property_features = $this->property->features->pluck('id')->toArray();
        // si estamos creando
        }else{
            $this->property = null;
            $this->authorize('create', Property::class); 
            $this->status = 1;
        }
    }

    /********************************************* MODULO UTILIDADES *********************************************/

    // resetear variables
    public function resetProperties() {
        $this->resetErrorBag();
        $this->reset($this->tableColumns);
    }

    // contar elementos de la membresia
    public function membershipCount($model, $max, $condition) {
        $membershipNumber = Auth::user()->company->membership->$max;
        $amount = count($model::where('company_id', Auth::user()->company_id)->where('deleted_at', NULL)->get());
        
        if($condition === '>='){
            if($amount >= $membershipNumber){
                session()->flash('messageError', 'Excede la cantidad permitida de '.$membershipNumber);
                $this->dispatch('toastrError', 'Excede la cantidad permitida de '.$membershipNumber);
                return true;
            }
        }
        if($condition === '>'){
            if($amount > $membershipNumber){
                session()->flash('messageError', 'Excede la cantidad permitida de '.$membershipNumber);
                $this->dispatch('toastrError', 'Excede la cantidad permitida de '.$membershipNumber);
                return true;
            }
        }
    }

    // contar elementos de la membresia
    public function membershipCountBetween($new_images, $propertyModel, $type, $max) {

        $amount = $new_images ? count($new_images) : 0;
        $amountExist = $propertyModel ? count($propertyModel->allPictures()->where('type', $type)->get()) : 0;
        // dd($amountExist);
        $membershipNumber = Auth::user()->company->membership->$max;

        $amountTotal = $amount + $amountExist;

        if($amountTotal > $membershipNumber){
            session()->flash('messageError', 'Excede la cantidad permitida de '.$membershipNumber);
            $this->dispatch('toastrError', 'Excede la cantidad permitida de '.$membershipNumber);
            return true;
        }
    }

    /********************************************* MODULO IMAGENES *********************************************/
    // eliminar imagen
    public function deleteImage($id, $type){
            $data = Property::find($id); // buscar dato del modelo por id
            $to_delete = $data->allPictures->where('type', $type)->first(); // datos de path a borrar
    
            if($to_delete){ // pasar los path de las imagenes a borrar y tambien eliminar registro
                CrudInterventionImage::deletePictureAndTumb($to_delete->path_jpg, $to_delete->path_jpg_tumb);
                $to_delete->delete();
            }
    }
    // eliminar imagen
    public function deleteImageAdditional($id, $type){
            $data = AllPicture::find($id); // buscar dato del modelo por id
    
            if($data){ // pasar los path de las imagenes a borrar y tambien eliminar registro
                CrudInterventionImage::deletePictureAndTumb($data->path_jpg, $data->path_jpg_tumb);
                $data->delete();
            }
    }

    // rotar imagen
    public function rotateImage($id, $type){
            $data = Property::find($id); // buscar dato del modelo por id
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
        if($this->property){
            $this->deleteImage($this->property->id, $type);

            $dataImage = CrudInterventionImage::uploadImage($image, $type); // guardar nuevas imagenes y actualizar registros
    
            $this->property->allPictures()->create([
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
        if($this->image_additional){
            foreach($this->image_additional as $item){
                $dataImage = CrudInterventionImage::uploadImage($item, 'image_additional'); // guardar nuevas imagenes y actualizar registros
        
                $this->property->allPictures()->create([
                    'uuid' => Str::uuid(),
                    'path_jpg' => $dataImage['jpg']['image_jpg'],
                    'path_jpg_tumb' => $dataImage['jpg']['tumb_jpg'],
                    'type' => $dataImage['jpg']['type'],
                ]);
            }
        }
    }

    /********************************************* MODULO SAVE *********************************************/
    // boton de guardar o editar
    public function save() {

        // Asegúrate de que el usuario tiene permisos para crear o actualizar la propiedad
        if (!Auth::user()) {
            abort(403, 'No tienes permiso para realizar esta acción.');
        }
        
        if($this->membershipCountBetween(
           $this->image_additional, 
            $this->property,
            'image_additional',
            'max_images'
        )){return;}

        // poner datos automaticos
        $this->slug = Str::slug(time() . '_' .$this->title);
        $this->status = $this->status ? 1 : 0;
        $this->garage = $this->garage ? 1 : 0;
        $this->yard = $this->yard ? 1 : 0;

        $this->company_id = Auth::user()->company_id;
        $this->user_id = Auth::user()->id;

        // validar datos
        $this->validate();

        // si editamos
        if( isset( $this->property['id'])) {
            $this->authorize('update', $this->property);
            if($this->membershipCount('\App\Models\Page\Property', 'max_properties', '>')){return;}
            // actualizar datos
            $this->property->update(
                $this->only($this->tableColumns)
            );

        // si creamos
        } else {
            $this->authorize('create', Property::class);
            if($this->membershipCount('\App\Models\Page\Property', 'max_properties', '>=')){return;}
            $this->uuid = Str::uuid();
            // crear empresa y obtener datos
            $this->property = Property::create(
                $this->only($this->tableColumns)
            );

        }

        $this->property->features()->sync($this->property_features);
        
        $this->saveImages();

        // limpiar variables
        $this->reset(['property']);
        $this->resetProperties();
                    
        // mensaje exitoso
        session()->flash('messageSuccess', 'Datos guardados correctamente.');
        $this->dispatch('toastrSuccess', 'Datos guardados correctamente');

        // redireccionar
        $this->redirect(route('properties.index'));
    }
    
    public function render()
    {
        // dd($this->property_features);
        $monies = Money::select('id', 'signo')->get();
        $methods = Method::select('id', 'name')->get();
        $property_types = PropertyType::select('id', 'name')->get();
        $features = Feature::select('id', 'name', 'category')->get();

        $this->imageCover = $this->property ? $this->property->allPictures()->where('type', 'image_cover')->first() : false;
        $this->imageAdditional = $this->property ? $this->property->allPictures()->where('type', 'image_additional')->get() : false;

        return view('livewire.page.property.property-create', compact(
            'monies',
            'methods',
            'property_types',
            'features',
        ));
    }
}
