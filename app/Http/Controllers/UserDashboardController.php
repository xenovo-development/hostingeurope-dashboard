<?php

namespace App\Http\Controllers;

use App\Classes\Factory\MonthlyProfitChartDataFactory;
use App\Classes\Factory\ReservationsChartDataFactory;
use App\Models\Listing;
use Carbon\Carbon;
use http\Cookie;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Returns user listing data for dashboard charts.
     *
     * @param $date
     * @return array
     */
    public function index($date = null): array
    {
        /**
         * Class  variables.
         */
        $dates = explode("-", $date);
        $startDate = empty($dates[0]) ? Carbon::create('2022-01-01') : Carbon::create($dates[0]);
        $endDate = empty($dates[1]) ? Carbon::create('2050-01-01') : Carbon::create($dates[1]);;
        $listings = Listing::where('user_id', Auth::user()['id'])->get();
        $reservations = collect($listings)->flatMap->reservations->whereBetween('checkIn', [$startDate, $endDate]);
        if ($reservations->count() > 30) {
            session(['should_slice'=>true]);
        }
        $reservationsChartData = (new ReservationsChartDataFactory())->getData($reservations);

        $monthlyProfitChartData = (new MonthlyProfitChartDataFactory())->getData($reservations);

        return
            [
                'listings' => $listings ?? [],
                'reservations' => $reservations,
                'user_total_revenue' => $reservationsChartData['totalRevenue'] ?? [],
                'user_total_raw_revenue' => $reservationsChartData['rawRevenue'] ?? [],
                'user_open_revenue' => $reservationsChartData['openRevenue'] ?? [],
                'user_open_raw_revenue' => $reservationsChartData['openRawRevenue'] ?? [],
                'series_months' => $monthlyProfitChartData['monthNames'] ?? [],
                'series_net_revenue' => $reservationsChartData['seriesNetRevenue'] ?? [],
                'series_monthly_revenue' => $monthlyProfitChartData['monthlyRevenue'] ?? [],
                'series_guests' => $reservationsChartData['seriesGuests'] ?? [],
                'series_pievals' => [$reservationsChartData['airbnb'], $reservationsChartData['booking'], $reservationsChartData['guest24']] ?? [],
                'reservation_dates' => $reservationsChartData['reservationDates'] ?? [],
                'reservation_listings' => $reservationsChartData['reservationListings'] ?? [],
                'reservation_nights' => $reservationsChartData['reservationNights'] ?? [],
                'hosting_europe_commission'=>$reservationsChartData['hostingEuropeCommission'] ??[],
            ];
    }
}
