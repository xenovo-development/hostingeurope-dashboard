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
         * Class global variables.
         */
        $now = Carbon::now();
        $listings = Listing::where('user_id', Auth::user()['id'])->get();
        foreach ($listings as $listing) {
            $reservations = $listing->reservations()->where('status', 'accepted')->get();
        }
        $totalRevenue = 0;
        $openRevenue = 0;

        /**
         * Set total and open revenue values && chart series variables.
         */
        foreach ($reservations as $reservation) {
            $listing = Listing::where('name',$reservation['listing_title'])->firstOrFail();
            $totalPercentage = $listing['cleaning_percent'] + $listing['cuts_percent'];
            $createdMonth = Carbon::parse($reservation['created_at'])->month;
            if($createdMonth <= $now->month){
                $openRevenue += $reservation['owner_revenue'] - ($reservation['owner_revenue'] * $totalPercentage / 100);
            }else{
                $openRevenue += $reservation['owner_revenue'] - ($reservation['owner_revenue'] * $totalPercentage / 100);
            }

            $seriesSubTotal[] = round($reservation['subtotal'] - ($reservation['owner_revenue'] * $totalPercentage / 100),2);
            $seriesCommission[] = $reservation['channel_commission'];
            $seriesNetRevenue[] = round($reservation['net_revenue'] - ($reservation['owner_revenue'] * $totalPercentage / 100),2);
            $reservationDates[] = $reservation['created_at'];
            $reservationListings[] = $reservation['listing_title'];
        };

        return
            [
                'reservations_count'=>count($reservations),
                'user_total_revenue' => $totalRevenue,
                'user_open_revenue'=>$openRevenue,
                'user_listing_count'=>count($listings),
                'series_subtotal'=> $seriesSubTotal,
                'series_commission'=> $seriesCommission,
                'series_net_revenue'=> $seriesNetRevenue,
                'reservation_dates'=> $reservationDates,
                'reservation_listings'=> $reservationListings,
            ];
    }
}
