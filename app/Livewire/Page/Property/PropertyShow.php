<?php

namespace App\Livewire\Page\Property;

use App\Models\Page\Property;
use Livewire\Component;

class PropertyShow extends Component
{
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

    $uuid,
    $status;

    public $property;
    public $propertyId;

    // montar
    public function mount()
    {
        if ($this->propertyId) {
            $this->property = Property::where('uuid', $this->propertyId)->first();
            $this->authorize('view', $this->property); 
        }
    }

    public function render()
    {
        $images = $this->property->allPictures->where('type', 'image_additional');
        return view('livewire.page.property.property-show', compact(
            'images'
        ));
    }
}
