<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\apartment;

/**
 * App\Models\Rent
 *
 * @property int $id
 * @property int $user_id
 * @property int $apartment_id
 * @property int $status
 * @property int $Rented
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read apartment|null $apartment
 * @property-read User|null $user
 * @method static \Database\Factories\RentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Rent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rent query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rent whereApartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rent whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rent whereRented($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rent whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rent whereUserId($value)
 * @mixin \Eloquent
 */
class Rent extends Model
{
    use HasFactory;

    // protected $fillable = [ ];
    protected $guarded= [];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function apartment(){
        return $this->belongsTo(apartment::class);
    }
}
