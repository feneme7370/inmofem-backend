<?php

namespace App\Livewire\Page\Property;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\Page\Property;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CrudInterventionImage;

class PropertyIndex extends Component
{
    
    ///////////////////////////// MODULO PAGINACION /////////////////////////////

    // paginacion
    use WithPagination;
    public function updatingActive() {$this->resetPage(pageName: 'p_property');}
    public function updatingSearch() {$this->resetPage(pageName: 'p_property');}

    // propiedades de busqueda
    public $active = false, $search = '', $sortBy = 'id', $sortAsc = false, $perPage = 10;

    public $property;
    public $deleteActionModal;

    // mostrar variables en queryString
    protected function queryString(){ return ['search' => [ 'as' => 'q' ],];}

    // ordenar la tabla
    public function orderTable($column){
        if($this->sortBy != $column){
            $this->sortBy = $column;
        }else{
            $this->sortAsc = !$this->sortAsc;
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
            select('id', 'title', 'uuid', 'price', 'status', 'money_id')
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
            ->whereNull('deleted_at')
            ->when($this->active, function( $query) {
                return $query->where('status', 1);
            })
            ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->perPage, pageName: 'p_property');

        return view('livewire.page.property.property-index', compact(
            'properties'
        ));
    }
}
