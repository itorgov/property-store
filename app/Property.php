<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $bedrooms
 * @property int $bathrooms
 * @property int $storeys
 * @property int $garages
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 */
class Property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'integer',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'storeys' => 'integer',
        'garages' => 'integer',
    ];

    /**
     * @param Builder $query
     * @param string $term
     * @return Builder
     */
    public function scopeNameLike(Builder $query, string $term): Builder
    {
        return $query->where('name', 'like', "%{$term}%");
    }

    /**
     * @param Builder $query
     * @param int $from
     * @return Builder
     */
    public function scopePriceFrom(Builder $query, int $from): Builder
    {
        return $query->where('price', '>=', $from);
    }

    /**
     * @param Builder $query
     * @param int $to
     * @return Builder
     */
    public function scopePriceTo(Builder $query, int $to): Builder
    {
        return $query->where('price', '<=', $to);
    }

    /**
     * @param Builder $query
     * @param int $bedroomsCount
     * @return Builder
     */
    public function scopeBedrooms(Builder $query, int $bedroomsCount): Builder
    {
        return $query->where('bedrooms', $bedroomsCount);
    }

    /**
     * @param Builder $query
     * @param int $bathroomsCount
     * @return Builder
     */
    public function scopeBathrooms(Builder $query, int $bathroomsCount): Builder
    {
        return $query->where('bathrooms', $bathroomsCount);
    }

    /**
     * @param Builder $query
     * @param int $storeysCount
     * @return Builder
     */
    public function scopeStoreys(Builder $query, int $storeysCount): Builder
    {
        return $query->where('storeys', $storeysCount);
    }

    /**
     * @param Builder $query
     * @param int $garagesCount
     * @return Builder
     */
    public function scopeGarages(Builder $query, int $garagesCount): Builder
    {
        return $query->where('garages', $garagesCount);
    }
}
