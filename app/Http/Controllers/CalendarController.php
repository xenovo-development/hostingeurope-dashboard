<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index()
    {
        $listings = Listing::where('user_id', Auth::user()['id'])->get();
        $reservationsflat = $listings->flatMap->reservations;
        $reservations = $reservationsflat->where('status','accepted');
        if(isset($reservations)) {
            foreach ($reservations as $reservation) {
                $calendarReservations[] = [
                    'title' => $reservation->listing->street,
                    'start' => $reservation['checkIn'],
                    'end' => $reservation['checkOut'],
                    'class-name' => 'bg-primary',
                    'editable'=>false,
                    'interactive'=>false,
                    'extendedProps' => [
                        'preventClick' => true,
                    ]
                ];
            }
        }
        /**
         * Return the calendar data.
         */
        return [
            'listings'=>$listings,
            'reservations'=>$calendarReservations ?? [],
            'reservation_dates'=>$reservationDates ?? [],
        ];
    }
}
