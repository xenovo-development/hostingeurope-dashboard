<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Listing extends Model
{
    use HasFactory;

    /**
     * Properties that are mass assignable.
     *
     * @var array[]
     */
    protected $fillable=
        [
            'listing_id',
            'property_type',
            'name',
            'nickname',
            'cleaning_fee',
            'extra_person',
            'guest_included',
            'default_daily_price',
            'weekend_price',
            'min_nights',
            'max_nights',
            'checkin_start',
            'checkin_end',
            'checkout',
            'thumbnail_file',
            'is_listed',
            'country',
            'country_code',
            'state',
            'city',
            'zipcode',
            'street',
            'neighborhood',
            'bedrooms',
            'beds',
            'symbol',
            'unicode',
            'integration_photo',
            'integration_name',
            'price',
            'price_monthly',
            'user_id'
        ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_listed'=>'boolean'
    ];


    /**
     * Get related user.
     *
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get related reservations.
     *
     * @return HasMany
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
