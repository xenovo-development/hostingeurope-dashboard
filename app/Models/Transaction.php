<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'channel_transaction_id',
        'currency',
        'amount',
        'arrival_date',
        'charge_date',
        'is_completed',
        'reservation_id',
        'code',
        'details',
        'notes',
        'payout_type',
        'source'
    ];

    /**
     * Get related reservation
     *
     * @return BelongsTo
     */
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }

    /**
     * Get related listing
     *
     * @return BelongsTo
     */
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}
