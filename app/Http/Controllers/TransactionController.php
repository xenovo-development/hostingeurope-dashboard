<?php

namespace App\Http\Controllers;

use App\Classes\Factory\CurrencyFactory;
use App\Models\Reservation;

class TransactionController extends Controller
{
    /**
     * Returns the transactions of given parameter. First parameter returns single instance while second parameter returns collection of instances.
     *
     * @param int $reservationId
     * @return mixed
     */
    public function index(int $reservationId): mixed
    {
        $commission = Auth()->user()['commission'];
        $reservation = Reservation::find($reservationId);

        $withoutCleaning = 0;
        foreach ($reservation->transactions as $transaction) {
            $withoutCleaning +=    $transaction['amount'];
        }
        $totalValue = $withoutCleaning - $reservation->listing['cleaning_fee'];
        $originalValue = round($totalValue - ($totalValue * $commission / 100),2);

        $taxPercentage = 12.5;
        $taxSubtract = ($originalValue * $taxPercentage)/100;
        $withoutTax = round(($originalValue - $taxSubtract),2);
        $currency = (new CurrencyFactory())->setCurrency($reservation);
        return [
            'reservation' => $reservation,
            'original_value'=>$originalValue,
            'tax_percentage' => $taxPercentage,
            'currency' => $currency,
            'tax_subtract'=>$taxSubtract,
            'without_tax' => $withoutTax,
            'details' => $reservation->transactions->first()['details'] ?? '',
            'without_cleaning' => $withoutCleaning
        ];
    }
}
