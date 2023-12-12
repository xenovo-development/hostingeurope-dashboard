<?php

namespace App\Classes\Factory;

use Illuminate\Support\Collection;

class ReservationsChartDataFactory
{
    /**
     * Factory design pattern for reservation chart data. | Set total and open revenue values && chart series variables.
     *
     * @param Collection $reservations
     * @return array
     */
    public function getData(Collection $reservations): array
    {
        $totalRevenue = 0;
        $openRevenue = 0;
        $airbnb = 0;
        $booking = 0;
        $guest24 = 0;
        $commission = Auth()->user()['commission'];

        foreach ($reservations as $reservation) {
            if ($reservation['status'] == 'accepted' && $reservation['subtotal'] != 0) {
                $netRevenue = $reservation['subtotal'] - $reservation['channel_commission'] - $reservation->listing['cleaning_fee'];
                if ($reservation['source'] == 'Airbnb') {
                    $airbnb++;
                }
                if ($reservation['source'] == 'Booking.com') {
                    $booking++;
                }
                if ($reservation['source'] == 'Guest24 Services') {
                    $guest24++;
                }
                if ($reservation->transactions && $reservation->transactions->count() > 0) {
                    $totalRevenue += $netRevenue - ($netRevenue * $commission / 100);
                } else {
                    $openRevenue += $netRevenue - ($netRevenue * $commission / 100);
                }


                $seriesNetRevenue[] = round($netRevenue - ($netRevenue * $commission / 100), 2);
                $seriesGuests [] = $reservation['guests'];
                $reservationDates[] = $reservation['checkIn'];
                $reservationListings[] = $reservation['listing_title'];
                $reservationNights [] = $reservation['nights'];
            }
        };

        return [
            'airbnb' => $airbnb,
            'booking' => $booking,
            'guest24' => $guest24,
            'totalRevenue' => $totalRevenue,
            'openRevenue' => $openRevenue,
            'seriesNetRevenue' => $seriesNetRevenue,
            'seriesGuests' => $seriesGuests,
            'reservationDates' => $reservationDates,
            'reservationListings' => $reservationListings,
            'reservationNights' => $reservationNights,
        ];
    }
}
