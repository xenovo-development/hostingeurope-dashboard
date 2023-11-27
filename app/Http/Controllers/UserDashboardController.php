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
        $now = Carbon::now();
        $commissionPercentage = Auth::user()['commission'];
        $listings = Listing::where('user_id', Auth::user()['id'])->get();
        foreach ($listings as $listing) {
            $reservationsArr[] = $listing->reservations()->get();
        };
        if (isset($reservationsArr)) {
            $reservations = collect($reservationsArr)->flatMap(function ($collection) {
                return $collection;
            });
        };
        $totalRevenue = 0;
        $openRevenue = 0;
        $airbnb = 0;
        $booking = 0;
        $guest24 = 0;

        /**
         * Regular month variables for charts
         */
        for ($month = 0; $month <= 11; $month++) {
            $monthStart = Carbon::create(date('Y'), $month)->startOfMonth();
            $monthEnd = Carbon::create(date('Y'), $month)->endOfMonth();
            $monthNames[] = $monthStart;
            $monthlyRevenue[] = round($reservations->where('status', 'accepted')
                ->whereBetween('created_at', [$monthStart->toDate(), $monthEnd->toDate()])
                ->sum('net_revenue'),2) -(round($reservations->where('status', 'accepted')
                    ->whereBetween('created_at', [$monthStart->toDate(), $monthEnd->toDate()])
                    ->sum('net_revenue'),2) * $commissionPercentage / 100)
            ;
        }


        /**
         * Set total and open revenue values && chart series variables.
         */
            foreach ($reservations as $reservation) {
                $createdMonth = Carbon::parse($reservation['created_at'])->month;
                if ($reservation['status'] == 'accepted'){
                    if ($reservation['source'] == 'Airbnb') {
                        $airbnb++;
                    }
                    if ($reservation['source'] == 'Booking.com') {
                        $booking++;
                    }
                    if ($reservation['source'] == 'Guest24 Services') {
                        $guest24++;
                    }
                    if ($createdMonth <= $now->month) {
                        $totalRevenue += $reservation['net_revenue'] - ($reservation['net_revenue'] * $commissionPercentage / 100);
                    }

                    $seriesNetRevenue[] = round($reservation['net_revenue'] - ($reservation['net_revenue'] * $commissionPercentage / 100), 2);
                    $seriesGuests [] = $reservation['guests'];
                    $reservationDates[] = $reservation['checkIn'];
                    $reservationListings[] = $reservation['listing_title'];
                    $reservationNights [] = $reservation['nights'];
                }
                elseif($reservation['status'] == 'awaiting_payment') {
                    $openRevenue += $reservation['net_revenue'] - ($reservation['net_revenue'] * $commissionPercentage / 100);
                }
        };

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
