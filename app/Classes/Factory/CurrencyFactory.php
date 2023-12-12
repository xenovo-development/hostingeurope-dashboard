<?php

namespace App\Classes\Factory;

use App\Models\Reservation;

class CurrencyFactory
{
    /**
     * Set a currency symbol for given reservation.
     *
     * @param Reservation $reservation
     * @return string
     */
    public function setCurrency(Reservation $reservation): string
    {
        switch($reservation['currency']){
            case 'EUR' : $currency = '€';
                break;
            case 'USD' : $currency = '$';
                break;
            case 'TRY' : $currency = '₺';
                break;
        }
        return $currency;
    }
}
