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
     * Unset auto incrementing ID field for listings so it can be set from Hosify API manually.
     */
    public $incrementing = false;

    /**
     * Properties that are mass assignable.
     */
    protected $fillable=
        [
            'id',
            'fs_integration_type',
            'currency',
            'channel_listing_id',
            'room_type',
            'listing_type',
            'property_type_id',
            'property_type',
            'instant_booking',
            'name',
            'nickname',
            'security_deposit',
            'cleaning_fee',
            'pets_fee',
            'extra_person',
            'guest_included',
            'default_daily_price',
            'weekend_price',
            'weekly_price_factor',
            'monthly_price_factor',
            'min_nights',
            'max_nights',
            'checkin_start',
            'checkin_end',
            'checkout',
            'cancel_policy',
            'max_notice_days',
            'min_notice_hours',
            'thumbnail_file',
            'is_listed',
            'country',
            'country_code',
            'state',
            'city',
            'zipcode',
            'street',
            'neighbourhood',
            'lat',
            'lng',
            'timezone_offset',
            'timezone',
            'price_markup',
            'master_calendar',
            'person_capacity',
            'bathrooms',
            'bathrooms_shared',
            'bedrooms',
            'beds',
            'area',
            'symbol',
            'unicode',
            'position',
            'service_pms',
            'integration_nickname',
            'integration_name',
            'integration_photo',
            'price',
            'price_monthly',
            'cleaning_percent',
            'cuts_percent',
            'tags',
            'custom_fields',
            'users',
            'integration_id',
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
