<?php

namespace App\Http\Controllers;

use App\Classes\Factory\CurrencyFactory;
use App\Classes\Factory\MonthlyProfitChartDataFactory;
use App\Classes\Factory\ReservationsChartDataFactory;
use App\Models\Listing;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    /**
     * Render the listing dashboard view
     *
     * @param int $listingId
     * @param null $date
     * @return array{listing: mixed, reservations: mixed}
     */
    public function index(int $listingId, $date = null): array
    {
        $listing = Listing::findOrFail($listingId);
        $reservations = $listing->reservations;
        $dates = explode("-", $date);
        $startDate = empty($dates[0]) ? Carbon::create('2022-01-01') : Carbon::create($dates[0]);
        $endDate = Carbon::create($dates[1] ?? Carbon::today());
        $startOfMonth = \Carbon\Carbon::now()->startOfMonth();
        $endOfMonth = \Carbon\Carbon::now()->endOfMonth();
        $currency = (new CurrencyFactory())->setCurrency($reservations->first());

        $reservationsChartData = (new ReservationsChartDataFactory())->getData($reservations);
        $monthlyProfitChartData = (new MonthlyProfitChartDataFactory())->getData($reservations);

        return [
            'listing' => $listing,
            'reservations' => $reservations,
            'reservations_monthly'=>$monthlyProfitChartData['monthlyReservations'],
            'reservations_this_month' => $reservations->whereBetween('checkIn', [$startOfMonth, $endOfMonth])->count(),
            'total_revenue' => $reservationsChartData['totalRevenue'],
            'open_revenue' => $reservationsChartData['openRevenue'],
            'currency' => $currency,
            'channels' => ['airbnb' => $reservationsChartData['airbnb'], 'booking' => $reservationsChartData['booking'], 'guest24' => $reservationsChartData['guest24']],
            'monthly_reservation_lengths'=>$monthlyProfitChartData['monthlyReservationLength'],
            'month_names'=>$monthlyProfitChartData['monthNames'],
        ];
    }
}
