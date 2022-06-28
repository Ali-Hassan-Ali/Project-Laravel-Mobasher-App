<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $guarded  = [];
    protected $appends  = ['image_path'];
    // protected $hidden   = ['created_at','deleted_at','image'];

     //attributes----------------------------------
    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

}//end of model
