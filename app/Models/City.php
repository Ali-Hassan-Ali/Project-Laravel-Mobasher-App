<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //relation -------------------------------------

    public function parent()
    {
        return $this->hasOne(City::class, 'parent_id');

    }//end of fun

    //scopes -------------------------------------
    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name' , 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`

}//end of model
