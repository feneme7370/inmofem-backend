<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureProperty extends Model
{

    use HasFactory;

    protected $table = 'feature_property';

    protected $fillable = [
        'feature_id',
        'property_id',
    ];
}
