<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\media
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image_path
 * @property int $apartment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\apartment|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|media query()
 * @method static \Illuminate\Database\Eloquent\Builder|media whereApartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|media whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|media whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class media extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','path','apartment_id'
    ];


    public function product()
    {
      return $this->belongsTo(apartment::class);
    }
}
