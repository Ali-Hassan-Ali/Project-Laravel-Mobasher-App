<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relation -------------------------------------
    public function user()
    {
        return $this->belongsTo(User::class);

    }//end of user

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);

    }//end of apartment

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
