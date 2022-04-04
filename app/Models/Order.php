<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //scopes -------------------------------------
    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name' , 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%");
        });
        
    }//end of scopeWhenSearch`
    
}//end of model
