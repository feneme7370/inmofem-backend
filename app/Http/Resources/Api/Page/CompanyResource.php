<?php

namespace App\Http\Resources\Api\Page;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'email' => $this->email,
            'phone' => $this->phone,
            'adress' => $this->adress,
            'city' => $this->city,
            'country' => $this->country,
            'url' => $this->url,

            'time_description' => $this->time_description,
            'short_description' => $this->short_description,
            'hero_description' => $this->hero_description,
            'description' => $this->description,

            'image_cover_path' => $this->image_cover_path,
            'image_logo_path' => $this->image_logo_path,
            'image_qr_path' => $this->image_qr_path,

            'status' => $this->status,
            
            'membership_id' => $this->membership_id,
            'membership' => $this->membership,

            'users' => $this->users,
            'properties' => $this->properties,
        ];
    }
}