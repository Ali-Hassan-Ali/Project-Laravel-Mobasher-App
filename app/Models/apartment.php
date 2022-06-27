<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Rent;
use App\Models\media;

class Apartment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'apartments';

    protected $guarded = [];
    protected $hidden  = ['deleted_at'];
    protected $appends = ['image_path','categorey_name','city','region'];

    //attributes----------------------------------
    public function getImagePathAttribute()
    {
        return Media::first()->image_path

    }//end of get image path

    public function getCategoreyNameAttribute()
    {
        return Category::findOrFail($this->category_id)->name;

    }//end of get image path

    public function getCityAttribute()
    {
        return City::findOrFail($this->city_id)->name;

    }//end of get image path

    public function getRegionAttribute()
    {
        return City::findOrFail($this->region_id)->name;

    }//end of get image path

    //relations ----------------------------------
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Media::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function properties()
    {
        return $this->hasMany(Propertie::class);
    }

    //scopes -------------------------------------
    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title' , 'like', "%$search%")
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
