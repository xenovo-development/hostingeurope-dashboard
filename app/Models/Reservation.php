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
        'extras_price_ex',
        'extras_price_inc',
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
        'confirmation_code',
        'nights',
        'checkIn',
        'checkOut',
        'guests',
        'adults',
        'children',
        'infants',
        'pets',
        'confirmed_at',
        'advance_days',
        'cancel_policy',
        'planned_arrival',
        'planned_departure',
        'beds_to_be_prepared',
        'notes',
        'extra_info',
        'cancel_penalty',
        'cleaning_notes',
        'guest_details',
        'price_details',
        'addons_details',
        'addons_price',
        'added_by',
        'updated_at',
        'cancelled_at',
        'payout_price',
        'payout_by_channel',
        'created_at',
        'city_tax',
        'channel_reservation_id',
        'listing_id',
        'listing_nickname',
        'channel_listing_id',
        'listing_channel_id',
        'guest_name',
        'guest_email',
        'guest_phone',
        'guest_photo',
        'guest_location',
        'guest_languages',
        'integration_id',
        'integration_name',
        'integration_nickname',
        'integration_type',
        'tags',
        'checked_in_mark',
        'checked_out_mark',
        'hostify_id',
        'paid_part',
        'paid_sum',
        'is_manual',
        'message_id',
        'guest_id',
        'parent_listing_id',
        'listing_title',
        'listing_photo',
        'integration_photo',
        'custom_fields',
        'vat_amount'
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
