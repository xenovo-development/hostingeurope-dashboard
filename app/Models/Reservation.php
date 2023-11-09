<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    /**
     * Attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable=[
        'currency',
        'price_per_night',
        'base_price',
        'security_price',
        'extras_price',
        'cancellation_fee',
        'tax_amount',
        'collected_tax',
        'host_collected_tax',
        'cleaning_fee',
        'channel_commission',
        'service_charge',
        'subtotal',
        'revenue',
        'transaction_fee',
        'sum_refunds',
        'owner_revenue',
        'net_revenue',
        'source',
        'status',
        'nights',
        'checkIn',
        'checkOut',
        'guests',
        'adults',
        'infants',
        'pets',
        'confirmed_at',
        'advance_days',
        'planned_arrival',
        'planned_departure',
        'notes',
        'extra_info',
        'cleaning_notes',
        'payout_price',
        'city_tax',
        'listing_id',
        'listing_nickname',
        'guest_name',
        'guest_email',
        'integration_id',
        'integration_name',
        'paid_sum',
        'is_manual',
        'listing_title',
        'listing_photo',
    ];

    /**
     * Get the related listing.
     *
     * @return BelongsTo
     */
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}
