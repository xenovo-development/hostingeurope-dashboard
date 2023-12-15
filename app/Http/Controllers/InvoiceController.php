<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Get invoice data for given time period
     *
     * @param $start
     * @param  $end
     * @return array
     */
    public function getInvoice($start,$end): array
    {
        $listings = Listing::where('user_id', Auth::user()['id'])->get();
        $reservations = collect($listings)->flatMap->reservations
            ->whereBetween('checkIn', [$start, $end])
            ->where('status','accepted');
        $commission = Auth::user()['commission'];
        if ($reservations->count() != 0){
            $totalRevenue = 0;
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
                if($reservation->transactions->count() > 0){
                    $totalRevenue +=  $reservation['subtotal'] - $reservation['channel_commission'] - $reservation->listing['cleaning_fee'];
                }
            }
            $commissionSubtract = ($totalRevenue * $commission) / 100;
            $finalSum = round(($totalRevenue - $commissionSubtract), 2);
        }else{
            $finalSum  = 0;
            $commissionSubtract = 0;
            $totalRevenue = 0;
    }

        return [
            'reservations' => $reservations ?? '0',
            'total_value' => (round($totalRevenue,2)) ?? '0',
            'commission' => $commission ?? '0',
            'currency' => $currency ?? '0',
            'commission_subtract' => round($commissionSubtract,2) ?? '0',
            'final_sum' => $finalSum ?? '0',
        ];
    }
}
