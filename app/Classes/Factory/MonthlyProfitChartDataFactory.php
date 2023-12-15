<?php

namespace App\Classes\Factory;

use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Collection;

class MonthlyProfitChartDataFactory
{
    /**
     * Regular month variables for monthly revenue charts
     *
     * @param Collection $reservations
     * @return array[]
     */
    public function getData(Collection $reservations): array
    {
        $commission = Auth()->user()['commission'];
        for ($month = 0; $month <= 12; $month++) {
            $monthStart = Carbon::create(date('Y'), $month)->startOfMonth();
            $monthEnd = Carbon::create(date('Y'), $month)->endOfMonth();
            $subtotals = 0;
            $cleaningFees = 0;
            $chCommissions = 0;
            $reservationLength = 0;
            $reservationsThisMonth = $reservations
                ->whereBetween('checkIn', [$monthStart, $monthEnd])
                ->where('status', 'accepted');
            foreach ($reservationsThisMonth as $reservation) {
                if ($reservation['subtotal'] && $reservation->transactions->count() > 0) {
                    $checkIn = new DateTime($reservation['checkIn']);
                    $checkOut = new DateTime($reservation['checkOut']);
                    $reservationLength += $checkOut->diff($checkIn)->days;
                    $subtotals += $reservation['subtotal'];
                    $chCommissions += $reservation['channel_commission'];
                    $cleaningFees += $reservation->listing['cleaning_fee'];
                }
            }
            $monthlyReservations [] = $reservationsThisMonth;
            $netRevenue = $subtotals - $cleaningFees - $chCommissions;
            $monthlyBookings [] = $reservationsThisMonth->count();
            $monthlyRevenue[] = round($netRevenue , 2);
            $monthNames[] = $monthStart;
            $monthlyReservationLength[] = $reservationLength;
        }

        return [
            'monthlyReservations'=> $monthlyReservations,
            'monthlyRevenue' => $monthlyRevenue,
            'monthNames'=>$monthNames,
            'monthlyBookings'=>$monthlyBookings,
            'monthlyReservationLength'=>$monthlyReservationLength,
            ];
    }
}
