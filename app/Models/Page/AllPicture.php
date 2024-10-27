<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllPicture extends Model
{

    use HasFactory;

    protected $fillable = ['path_jpg', 'path_jpg_tumb', 'imageable_id', 'imageable_type', 'type'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
