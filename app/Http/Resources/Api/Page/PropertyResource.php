<?php

namespace App\Http\Resources\Api\Page;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
    
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
    
    
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'garage' => $this->garage,
            'yard' => $this->yard,
            'size' => $this->size,
    
            'money_id' => $this->money_id,
            'money' => $this->money,
            'method_id' => $this->method_id,
            'method' => $this->method,
            'property_type_id' => $this->property_type_id,
            'property_type' => $this->property_type,
            'company_id' => $this->company_id,
            'company' => $this->company,
            'user' => $this->user,
    
            'status' => $this->status,
            'deleted_at' => $this->deleted_at,
            
            
            'allPictures' => $this->allPictures,
            'features' => $this->features,


        ];
    }
}
