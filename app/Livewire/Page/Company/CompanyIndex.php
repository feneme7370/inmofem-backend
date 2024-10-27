<?php

namespace App\Livewire\Page\Company;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Page\Company;
use Livewire\WithPagination;

class CompanyIndex extends Component
{
    ///////////////////////////// MODULO PAGINACION /////////////////////////////

    // paginacion
    use WithPagination;
    public function updatingActive() {$this->resetPage(pageName: 'p_company');}
    public function updatingSearch() {$this->resetPage(pageName: 'p_company');}

    // propiedades de busqueda
    public $active = false, $search = '', $sortBy = 'id', $sortAsc = false, $perPage = 10;

    public $company;
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
        $this->company = Company::find($id);

        $this->authorize('delete', $this->company); 
        $this->deleteActionModal = true;
    }

    public function delete(){
        $this->company->update(
                [
                    'deleted_at' => Carbon::now(),
                    'status' => 0,
                    $this->company->name = 'delete_' . today()->format('Y-m-d_h-m-s') . '_' . $this->company->name,
                    $this->company->slug = Str::slug($this->company->name),
                    $this->company->email = 'delete_' . now()->format('Y-m-d_h-m-s') . '_' . $this->company->email,
                ]
        );
        $this->reset(['company']);
        $this->deleteActionModal = false;
    }

    public function render()
    {

        $companies = Company::select('id', 'name', 'email', 'status')
            ->with('membership', 'allPictures')
            ->when( $this->search, function($query) {
                return $query->where(function( $query) {
                    $query->where('name', 'like', '%'.$this->search . '%')
                    ->orWhere('email', 'like', '%'.$this->search . '%');
                });
            })
            ->whereNull('deleted_at')
            ->when($this->active, function( $query) {
                return $query->where('status', 1);
            })
            ->orderBy( $this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->perPage, pageName: 'p_company');
        
        return view('livewire.page.company.company-index', compact(
            'companies',
        ));
    }
}
