<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    /**
     * Return reservations data.
     *
     * @return array
     */
    public function index(): array
    {
        $listings = Listing::where('user_id',Auth::user()['id'])->get();
        $reservations = Reservation::whereHas('listing', function ($query) {
            $query->where('user_id', Auth::id());
        })->where('status', 'accepted')->paginate(50);;

         return[
             'listings'=>$listings,
             'reservations'=>$reservations
         ];
    }
}
