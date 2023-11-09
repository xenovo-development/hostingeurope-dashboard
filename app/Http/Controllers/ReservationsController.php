<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function getChartData() {
        return Listing::where('user_id',1)->reservations->sum('net_revenue');
    }
}
