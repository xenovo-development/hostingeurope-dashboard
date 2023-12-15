<?php

namespace App\Classes\Factory;

use Carbon\Carbon;
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
        $rawRevenue  = 0;
        $openRevenue = 0;
        $openRawRevenue = 0;
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
                    $rawRevenue += $reservation['subtotal'] - $reservation['channel_commission'] - $reservation->listing['cleaning_fee'];
                    $totalRevenue += $netRevenue - ($netRevenue * $commission / 100);
                } else {
                    $openRevenue += $netRevenue - ($netRevenue * $commission / 100);
                    $openRawRevenue += $reservation['subtotal']  - $reservation['channel_commission'] -  $reservation->listing['cleaning_fee'];;
                }

                $reservationListings[] = $reservation['listing_title'];
                $seriesNetRevenue[] = round($netRevenue - ($netRevenue * $commission / 100), 2) ?? 0;
                $seriesGuests [] = $reservation['guests'];
                $reservationNights [] = $reservation['nights'];
                $reservationDates[] = Carbon::parse($reservation['checkIn'])->format('D, d M Y');
            }
        };

        return [
            'airbnb' => $airbnb ?? 0,
            'booking' => $booking ?? 0,
            'guest24' => $guest24 ?? 0,
            'totalRevenue' => $totalRevenue ?? 0,
            'rawRevenue' => $rawRevenue ?? 0,
            'openRawRevenue' => $openRawRevenue ?? 0,
            'openRevenue' => $openRevenue ?? 0,
            'seriesNetRevenue' => $seriesNetRevenue ?? 0,
            'seriesGuests' => $seriesGuests ?? 0,
            'reservationDates' => $reservationDates ?? 'No data',
            'reservationListings' => $reservationListings ?? 'No data',
            'reservationNights' => $reservationNights ?? 0,
            'hostingEuropeCommission'=>(($rawRevenue+$openRawRevenue) / 100) * $commission,
        ];
    }
}
