<?php

namespace App\Livewire\Page\Company;

use Livewire\Component;
use App\Models\Page\Company;

class CompanyShow extends Component
{
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
    $status;

    public $company;
    public $companyId;

    // montar
    public function mount()
    {
        if ($this->companyId) {
            
            $this->company = Company::findOrFail($this->companyId);
            $this->authorize('view', $this->company); 
        }
    }
    public function render()
    {
        return view('livewire.page.company.company-show');
    }
}
