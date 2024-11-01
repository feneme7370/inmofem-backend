<?php

namespace App\Livewire\Page\Property;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\Page\Property;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CrudInterventionImage;
use App\Models\Page\Method;
use App\Models\Page\PropertyType;

class PropertyIndex extends Component
{
    
    ///////////////////////////// MODULO PAGINACION /////////////////////////////

    // paginacion
    use WithPagination;
    public function updatingActive() {$this->resetPage(pageName: 'p_property');}
    public function updatingSearch() {$this->resetPage(pageName: 'p_property');}
    public function updatingMethod() {$this->resetPage(pageName: 'p_property');}
    public function updatingPropertyType() {$this->resetPage(pageName: 'p_property');}

    // propiedades de busqueda
    public $active = false, $search = '', $sortBy = 'id', $sortAsc = false, $perPage = 10;
    public $method = null, $method_name;
    public $property_type = null, $property_type_name;

    public $property;
    public $deleteActionModal;

    // mostrar variables en queryString
    protected function queryString(){ return ['search' => [ 'as' => 'q' ],'method' => [ 'as' => 'm' ],'property_type' => [ 'as' => 'pt' ]];}

    // ordenar la tabla
    public function orderTable($column){
        if($this->sortBy != $column){
            $this->sortBy = $column;
        }else{
            $this->sortAsc = !$this->sortAsc;
        }
    }

    // cambiar estado
    public function isStatus($id){
        $property = Property::where('uuid', $id)->first();
        $property->update(
            ['status' => !$property->status ? 1 : 0]
        );
    }
    // cambiar publicacion
    public function isSend($id){
        $property = Property::where('uuid', $id)->first();
        if($property->is_send == null){
            $property->update(
                ['is_send' => 1, 'send_at' => Carbon::now()]
            );
        }else{
            $property->update(
                ['is_send' => 0, 'send_at' => null]
            );
        }
    }
     // mostrar modal para confirmar crear
     public function deleteModal($id) {
        $this->property = Property::where('uuid', $id)->first();
        $this->authorize('delete', $this->property); 
        
        $this->deleteActionModal = true;
    }

    public function delete(){
        if($this->property->allPictures()->count()){
            foreach($this->property->allPictures()->get() as $to_delete){
                CrudInterventionImage::deletePictureAndTumb($to_delete->path_jpg, $to_delete->path_jpg_tumb);
            }
        }
        $this->property->update(
                [
                    'deleted_at' => Carbon::now(),
                    'status' => 0,
                    $this->property->title = 'delete_' . today()->format('Y-m-d_h-m-s') . '_' . $this->property->title,
                    $this->property->slug = Str::slug($this->property->title),
                ]
        );
        $this->reset(['property']);
        $this->deleteActionModal = false;
    }

    public function render()
    {
        $properties = Property::
            select('id', 'title', 'uuid', 'price', 'status', 'is_send', 'money_id', 'method_id', 'property_type_id')
            ->with('money', 'method', 'property_type', 'features', 'allPictures', 'user', 'company')
            ->where('company_id', Auth::user()->company->id)
            ->when( $this->search, function($query) {
                return $query->where(function( $query) {
                    $query->where('title', 'like', '%'.$this->search . '%')
                    ->orWhere('address', 'like', '%'.$this->search . '%')
                    ->orWhere('city', 'like', '%'.$this->search . '%')
                    ->orWhere('country', 'like', '%'.$this->search . '%');
                });
            })
            ->when($this->method, function( $query) {
                return $query->where('method_id', $this->method);
            })
            ->when($this->property_type, function( $query) {
                return $query->where('property_type_id', $this->property_type);
            })
            ->whereNull('deleted_at')
            ->when($this->active, function( $query) {
                return $query->where('status', 1);
            })
            ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->perPage, pageName: 'p_property');

        $methods = Method::select('id', 'name')->get();
        $property_types = PropertyType::select('id', 'name')->get();

        $this->method_name = Method::find($this->method) ? Method::find($this->method)->name : 'Todos';
        $this->property_type_name = PropertyType::find($this->property_type) ? PropertyType::find($this->property_type)->name : 'Todos';
        

        return view('livewire.page.property.property-index', compact(
            'properties',
            'methods',
            'property_types',
        ));
    }
}
