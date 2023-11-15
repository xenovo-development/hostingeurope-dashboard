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
         * Set total and open revenue values.
         */
        foreach ($reservations as $reservation) {
            $createdMonth = Carbon::parse($reservation['created_at'])->month;
            if($createdMonth <= $now->month){
                $openRevenue += $reservation['owner_revenue'];
            }else{
                $totalRevenue += $reservation['owner_revenue'];
            }
        };

        /**
         * Set chart series variables.
         */
        foreach($reservations as $reservation){
            $seriesSubTotal[] = $reservation['subtotal'];
            $seriesCommission[] = $reservation['channel_commission'];
            $seriesNetRevenue[] = $reservation['net_revenue'];
            $reservationDates[] = $reservation['created_at'];
            $reservationListings[] = $reservation['listing_title'];
        }

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
