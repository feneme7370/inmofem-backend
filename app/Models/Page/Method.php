<?php

namespace App\Models\Page;

use App\Models\User;
use App\Models\Page\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'uuid',
        
        'user_id',
        'company_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function properties() {
        return $this->hasMany(Property::class, 'money_id', 'id');
    }
}
