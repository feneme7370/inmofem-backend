<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'signo',
        'description',
        'status',
        
        'user_id',
        'company_id',
    ];

    public function properties() {
        return $this->hasMany(Property::class, 'money_id', 'id');
    }
}
