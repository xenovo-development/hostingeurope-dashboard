<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Returns user listing data for dashboard charts.
     *
     * @return array
     */
    public function index(): array
    {
        /**
         * Class  variables.
         */
        $totalRevenue = 0;
        $openRevenue = 0;
        $airbnb = 0;
        $booking = 0;
        $guest24 = 0;
        $commission = Auth()->user()['commission'];
        $listings = Listing::where('user_id', Auth::user()['id'])->get();
        $reservations = collect($listings)->flatMap->reservations;

        /**
         * Set total and open revenue values && chart series variables.
         */
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

        /**
         * Regular month variables for charts
         */
        for ($month = 0; $month <= 11; $month++) {
            $monthStart = Carbon::create(date('Y'), $month)->startOfMonth();
            $monthEnd = Carbon::create(date('Y'), $month)->endOfMonth();
            $monthNames[] = $monthStart;
            $subtotals = 0;
            $cleaningFees = 0;
            $chCommissions = 0;
            $reservationsThisMonth = $reservations
                ->whereBetween('checkIn', [$monthStart, $monthEnd])
                ->where('status', 'accepted');

            foreach ($reservationsThisMonth as $reservation) {
                if ($reservation['subtotal'] != 0) {
                    $subtotals += $reservation['subtotal'];
                    $chCommissions += $reservation['channel_commission'];
                    $cleaningFees += $reservation['cleaning_fee'];
                }
            }
            $netRevenue = $subtotals - $cleaningFees - $chCommissions;
            $monthlyRevenue[] = round($netRevenue - ($netRevenue * $commission / 100), 2);
        }

        return
            [
                'reservations' => $reservations,
                'user_total_revenue' => $totalRevenue ?? [],
                'user_open_revenue' => $openRevenue ?? [],
                'series_net_revenue' => $seriesNetRevenue ?? [],
                'series_months' => $monthNames ?? [],
                'series_monthly_profit' => $monthlyRevenue ?? [],
                'series_guests' => $seriesGuests ?? [],
                'series_pievals' => [$airbnb, $booking, $guest24] ?? [],
                'reservation_dates' => $reservationDates ?? [],
                'reservation_listings' => $reservationListings ?? [],
                'reservation_nights' => $reservationNights ?? [],
                'listings' => $listings ?? [],
            ];
    }
}
