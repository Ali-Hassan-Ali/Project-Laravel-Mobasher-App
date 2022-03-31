<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\apartment;

/**
 * App\Models\provider
 *
 * @property int $id
 * @property int $user_id
 * @property int $apartment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read apartment|null $apartment
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|provider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|provider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|provider query()
 * @method static \Illuminate\Database\Eloquent\Builder|provider whereApartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|provider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|provider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|provider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|provider whereUserId($value)
 * @mixin \Eloquent
 */
class provider extends Model
{
    use HasFactory;

    protected $guarded= [];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function apartment(){
        return $this->belongsTo(apartment::class);
    }
}
