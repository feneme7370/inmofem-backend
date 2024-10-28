<?php

namespace App\Models\Page;

use App\Models\User;
use App\Models\Page\Property;
use App\Models\Page\AllPicture;
use App\Models\Page\Membership;
use App\Models\Page\PropertyType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug', //unique
        'email', // unique
        'address',
        'phone',
        'city',
        'country',
        'url',

        'description',
        'hero_description',
        'time_description',
        'short_description',

        'image_cover_path',
        'image_logo_path',
        'image_qr_path',

        'uuid',
        'membership_id',
        'status',
        'deleted_at',

    ];

    public function membership() {
        return $this->belongsTo(Membership::class, 'membership_id', 'id');
    }
    public function users() {
        return $this->hasMany(User::class, 'company_id', 'id');
    }
    public function allPictures()
    {
        return $this->morphMany(AllPicture::class, 'imageable');
    }
    public function property_types() {
        return $this->hasMany(PropertyType::class, 'company_id', 'id');
    }
    public function properties() {
        return $this->hasMany(Property::class, 'company_id', 'id');
    }
}
