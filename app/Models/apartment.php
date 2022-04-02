<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Rent;
use App\Models\media;

/**
 * App\Models\apartment
 *
 * @property int $id
 * @property string $Titel
 * @property string $type
 * @property string $floor
 * @property string $city
 * @property string $state
 * @property string $dimensions
 * @property int $small_room
 * @property int $medium_room
 * @property int $large_room
 * @property int $extra_large_room
 * @property string $street
 * @property string $Description
 * @property int $price
 * @property string|null $lat
 * @property string|null $lng
 * @property int $avilibalty
 * @property string|null $Available_at
 * @property int $class
 * @property int $views
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Rent[] $Rents
 * @property-read int|null $rents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|media[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\apartmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|apartment newQuery()
 * @method static \Illuminate\Database\Query\Builder|apartment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|apartment query()
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereAvailableAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereAvilibalty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereDimensions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereExtraLargeRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereLargeRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereMediumRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereSmallRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereTitel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|apartment whereViews($value)
 * @method static \Illuminate\Database\Query\Builder|apartment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|apartment withoutTrashed()
 * @mixin \Eloquent
 */

class Apartment extends Model
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
