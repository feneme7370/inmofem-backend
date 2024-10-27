<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Model;
use App\Models\Page\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membership extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'price',

        'description',
        'short_description',
      
        'max_properties',
        'max_images',
        'max_type_properties',
        'max_property_services',
        'max_tags',
        'max_suggestions',
      
        'status',
        'deleted_at',
    ];

    public function companies() {
        return $this->hasMany(Company::class, 'membership_id', 'id');
    }
}
