<?php /** @noinspection DuplicatedCode */

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
        $commission = Auth()->user()['commission'];

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

            $reservationsThisMonth = $reservations
                ->whereBetween('checkIn', [$monthStart, $monthEnd])
                ->where('status', 'accepted');

            $subtotals = 0;
            $cleaningFees = 0;
            $chCommissions = 0;
            foreach ($reservationsThisMonth as $reservation){
                $subtotals += $reservation['subtotal'];
                $chCommissions += $reservation['channel_commission'];
                $cleaningFees += $reservation['cleaning_fee'];
            }
            $netRevenue = $subtotals - $cleaningFees - $chCommissions;
            $monthlyRevenue[] = round($netRevenue - ($netRevenue * $commission / 100) ,2);
            $monthlyBookings [] = $reservations->where('status', 'accepted')
                ->whereBetween('created_at', [$monthStart->toDate(), $monthEnd->toDate()])->count();
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
