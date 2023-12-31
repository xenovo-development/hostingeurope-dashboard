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
        foreach ($listings as $listing) {
            $reservations = $listing->reservations()->where('status', 'accepted')->get();
        }
        if(isset($reservations)) {
            foreach ($reservations as $reservation) {
                $calendarReservations[] = [
                    'title' => $reservation['guest_name'] . ' - ' . $reservation->listing->street,
                    'start' => $reservation['checkIn'],
                    'end' => $reservation['checkOut'],
                    'class-name' => 'bg-primary'
                ];
            }
        }
        /**
         * Return the calendar data.
         */
        return [
            'listings'=>$listings,
            'reservations'=>$calendarReservations ?? [],
        ];
    }
}
