<?php

namespace App\Http\Resources\Api\Page;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyTypeResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,

            'company_id' => $this->company_id,
            'company' => $this->company,
            'user_id' => $this->user_id,
            'user' => $this->user,
    
            'status' => $this->status,
        ];
    }
}