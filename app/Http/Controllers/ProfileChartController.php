<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ProfileChartController extends Controller
{
    /**
     * Return the chart data.
     *
     * @param \DateTime|null $startDate
     * @param \DateTime|null $endDate
     * @return array{listings: mixed}
     */
    public function index(\DateTime $startDate = null, \DateTime $endDate = null): array
    {
        $listings = Listing::where('user_id', Auth::user()['id'])->get();
        foreach ($listings as $listing) {
            $reservationsArr [] = collect($listing->reservations);
        };

        if(isset($reservationsArr)) {
            $reservations = collect($reservationsArr)->flatMap(function ($collection) {
                return $collection;
            });
        };

        for ($month = 0; $month <= 11; $month++) {
            $monthStart = Carbon::create(date('Y'), $month)->startOfMonth();
            $monthEnd = Carbon::create(date('Y'), $month)->endOfMonth();

            $monthlyBookings [] = $reservations->where('status', 'accepted')
                ->whereBetween('created_at', [$monthStart->toDate(), $monthEnd->toDate()])->count();
            $monthlyRevenue[] = $reservations->where('status', 'accepted')
                ->whereBetween('created_at', [$monthStart->toDate(), $monthEnd->toDate()])->sum('net_revenue');
            $monthNames[]= $monthStart->format('M');
        }

        return [
            'listings' => $listings,
            'series_bookings_count' => $monthlyBookings,
            'series_revenue' => $monthlyRevenue,
            'series_months' => $monthNames,
        ];
    }
}
