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
     * @param $listing_id
     * @return array
     */
    public function index($listing_id): array
    {
        $reservations = Reservation::where('listing_id',$listing_id)->paginate(50);

         return[
             'reservations'=>$reservations
         ];
    }
}
