<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Rent;
use App\Models\media;

class apartment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'apartments';

    protected $fillable = [
        'Titel','type','floor','city','state','dimensions','small_room',
        'medium_room','large_room','extra_large_room','street',
        'Description','price','lat','lng','avilibalty',
        'Available_at','photos','class','views'
    ];

    public function Rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(media::class);
    }

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('Titel' , 'like', "%$search%")
            ->orWhere('type', 'like', "%$search%")
            ->orWhere('floor', 'like', "%$search%")
            ->orWhere('city', 'like', "%$search%")
            ->orWhere('state', 'like', "%$search%")
            ->orWhere('dimensions', 'like', "%$search%")
            ->orWhere('small_room', 'like', "%$search%")
            ->orWhere('medium_room', 'like', "%$search%")
            ->orWhere('large_room', 'like', "%$search%")
            ->orWhere('extra_large_room', 'like', "%$search%")
            ->orWhere('street', 'like', "%$search%")
            ->orWhere('Description', 'like', "%$search%")
            ->orWhere('price', 'like', "%$search%")
            ->orWhere('lat', 'like', "%$search%")
            ->orWhere('lng', 'like', "%$search%")
            ->orWhere('avilibalty', 'like', "%$search%")
            ->orWhere('Available_at', 'like', "%$search%")
            ->orWhere('class', 'like', "%$search%")
            ->orWhere('views', 'like', "%$search%");
            
        });

    }//end ofscopeWhenSearch

}//end of model
