<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'apartments';

    protected $guarded = [];
    protected $hidden  = ['deleted_at'];
    protected $appends = ['category_name','city','region','video_path', 'ownership_path', 'national_card_path','phone_master'];

    //attributes----------------------------------
    public function getVideoPathAttribute()
    {
        return asset('storage/'. $this->video);

    }//end of get video path

    public function getPhoneMasterAttribute()
    {
        return setting('phone_master');

    }//end of get video path

    public function getOwnershipPathAttribute()
    {
        return asset('storage/'. $this->ownership);

    }//end of get ownership path

    public function getNationalCardPathAttribute()
    {
        return asset('storage/'. $this->national_card);

    }//end of get national_card path

    public function getCategoryNameAttribute()
    {
        return Category::findOrFail($this->category_id)->name;

    }//end of get image path

    public function getCityAttribute()
    {
        if ($this->city_id) {
            
            return City::findOrFail($this->city_id)->name ?? '';
        }

        return;

    }//end of get image path

    public function getRegionAttribute()
    {
        return City::findOrFail($this->region_id)->name ?? '';

    }//end of get image path

    //relations ----------------------------------
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function images()
    {
        return $this->hasMany(Media::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }//end of belongsTo city

    public function citiy()
    {
        return $this->belongsTo(City::class, 'city_id');

    }//end of belongsTo city

    public function regione()
    {
        return $this->belongsTo(City::class, 'region_id');

    }//end of belongsTo city

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
