<?php

namespace App\Http\Controllers;

use App\Classes\Factory\CurrencyFactory;
use App\Classes\Factory\MonthlyProfitChartDataFactory;
use App\Classes\Factory\ReservationsChartDataFactory;
use App\Models\Listing;
use App\Models\Reservation;
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
        $dates = explode("-", $date);
        $startDate = empty($dates[0]) ? Carbon::create('2022-01-01') : Carbon::create($dates[0]);
        $endDate = empty($dates[1]) ? Carbon::create('2050-01-01') : Carbon::create($dates[1]);
        $reservations = Reservation::where('listing_id',$listingId)->whereBetween('checkIn',[$startDate,$endDate])->get();
//        dd($reservations);
        $startOfMonth = \Carbon\Carbon::now()->startOfMonth();
        $endOfMonth = \Carbon\Carbon::now()->endOfMonth();
        if($reservations->count() > 0){
            $currency = (new CurrencyFactory())->setCurrency($reservations->first());
            $reservationsChartData = (new ReservationsChartDataFactory())->getData($reservations);
            $monthlyProfitChartData = (new MonthlyProfitChartDataFactory())->getData($reservations);
        }

        return [
            'listing' => $listing,
            'reservations' => $reservations,
            'reservations_monthly'=>$monthlyProfitChartData['monthlyReservations'],
            'reservations_this_month' => $reservations->whereBetween('checkIn', [$startOfMonth, $endOfMonth])->count(),
            'total_revenue' => $reservationsChartData['totalRevenue'],
            'open_revenue' => $reservationsChartData['openRevenue'],
            'series_net_revenue' => array_slice($reservationsChartData['seriesNetRevenue'], -30),
            'series_guests' => array_slice($reservationsChartData['seriesGuests'], -30),
            'series_reservation_dates' => array_slice($reservationsChartData['reservationDates'], -30),
            'series_reservation_nights' => array_slice($reservationsChartData['reservationNights'], -30),
            'currency' => $currency,
            'channels' => ['airbnb' => $reservationsChartData['airbnbPercentage'], 'booking' => $reservationsChartData['bookingPercentage'], 'guest24' => $reservationsChartData['guest24Percentage']],
            'monthly_reservation_lengths'=>$monthlyProfitChartData['monthlyReservationLength'],
            'month_names'=>$monthlyProfitChartData['monthNames'],
            'occupancy_by_month'=>$monthlyProfitChartData['occupancyByMonth']
        ];
    }
}
