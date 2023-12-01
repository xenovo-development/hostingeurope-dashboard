<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Return invoice data.
     *
     * @param \DateTime|null $start
     * @param \DateTime|null $end
     * @return array
     */
    public function index(\DateTime $start = null, \DateTime $end = null): array
    {
        $listings = Listing::where('user_id', Auth::user()['id'])->get();
        $reservations = collect($listings)->flatMap->reservations
            ->whereBetween('checkIn', [$start ?? Carbon::now()->startOfMonth(), $end ?? Carbon::now()])
            ->where('status','accepted');
        $commission = Auth::user()['commission'];
        $totalRevenue = 0;
        $taxPercentage = 12.5;
        switch ($reservations->first()['currency']) {
            case 'EUR' :
                $currency = '€';
                break;
            case 'USD' :
                $currency = '$';
                break;
            case 'TRY' :
                $currency = '₺';
                break;
        }


        foreach ($reservations as $reservation) {
            $netRevenue = $reservation['subtotal'] - $reservation['channel_commission'] - $reservation->listing['cleaning_fee'];
            $totalRevenue += $netRevenue - ($netRevenue * $commission / 100);
        }
        $taxSubtract = ($totalRevenue * $taxPercentage) / 100;
        $withoutTax = round(($totalRevenue - $taxSubtract), 2);

        return [
            'reservations' => $reservations,
            'total_value' => round($totalRevenue,2),
            'tax_percentage' => $taxPercentage,
            'currency' => $currency,
            'tax_subtract' => round($taxSubtract,2),
            'without_tax' => $withoutTax,
            'details' => $reservation->transactions->first()['details'] ?? '',
        ];
    }
}
