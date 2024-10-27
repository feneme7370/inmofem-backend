<?php

namespace App\Models\Page;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'slug', //unique
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
        'deleted_at',

    ];

    public function money() {
        return $this->belongsTo(Money::class, 'money_id', 'id');
    }
    public function method() {
        return $this->belongsTo(Method::class, 'method_id', 'id');
    }
    public function property_type() {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'id');
    }
    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_property');
    }

    public function allPictures()
    {
        return $this->morphMany(AllPicture::class, 'imageable');
    }

}