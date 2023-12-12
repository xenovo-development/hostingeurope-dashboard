<?php /** @noinspection DuplicatedCode */

namespace App\Http\Controllers;

use App\Classes\Factory\MonthlyProfitChartDataFactory;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

class ProfileChartController extends Controller
{
    /**
     * Return the chart data.
     *
     * @return array{listings: mixed}
     */
    public function index($date = null): array
    {
        $listings = Listing::where('user_id', Auth::user()['id'])->get();
        $reservations = $listings->flatMap->reservations;

        if (!empty($reservations)) {
            $monthlyProfitChartData = (new MonthlyProfitChartDataFactory())->getData($reservations);
        }

        return [
            'listings' => $listings ?? '',
            'series_bookings_count' => $monthlyProfitChartData['monthlyBookings'] ?? '',
            'series_revenue' => $monthlyProfitChartData['monthlyRevenue'] ?? '',
            'series_months' => $monthlyProfitChartData['monthNames'] ?? '',
        ];
    }
}
