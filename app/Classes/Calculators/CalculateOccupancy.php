<?php

namespace App\Classes\Calculators;

use App\Models\Listing;
use Carbon\Carbon;

class CalculateOccupancy
{
    public function calculateOccupancy(Listing $listing)
    {

        for ($month = 0; $month <= 12; $month++) {
            $monthStart = Carbon::create(date('Y'), $month)->startOfMonth();
            $monthEnd = Carbon::create(date('Y'), $month)->endOfMonth();
            $reservationsThisMonth = $listing->reservations->whereBetween('checkIn',[$monthStart,$monthEnd]);
            foreach($reservationsThisMonth as $reservation){
                $checkIns[]= $reservation['checkIn'];
                $checkIns[]= $reservation['checkIn'];
            }
        }
    }
}
