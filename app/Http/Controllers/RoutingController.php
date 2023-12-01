<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoutingController extends Controller
{

    public function __construct()
    {
        // $this->
        // middleware('auth')->
        // except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::user()) {
            return redirect('index');
        } else {
            return redirect('login');
        }
    }

    /**
     * Display a view based on first route param
     *
     * @return \Illuminate\Http\Response
     */
    public function root(Request $request, $first)
    {

        /**
         * User Dashboard (index) page data mount.
         */
        if($first == 'index'){
            $dashboardData = (new UserDashboardController)->index();
        };


        $mode = $request->query('mode');
        $demo = $request->query('demo');

        if ($first == "assets")
            return redirect('home');

        return view($first, ['mode' => $mode, 'demo' => $demo])
            ->with('dashboardData',$dashboardData);
    }

    /**
     * second level route
     */
    public function secondLevel(Request $request, $first, $second)
    {
        $mode = $request->query('mode');
        $demo = $request->query('demo');
        $listingId = $request->query('listingId');
        $reservationId = $request->query('reservationId');

        if($first == 'apps' && $second == 'calendar'){
            $calendarData = (new CalendarController)->index();
        }
        if($first == 'pages' && $second == 'properties'){
            $propertiesData = (new ListingController())->index();
        }
        if($first == 'pages' && $second == 'reservations'){
            $reservationsData = (new ReservationsController())->index($listingId);
        }
        if($first == 'pages' && $second == 'profile'){
            $profileData = (new ProfileChartController())->index();
        }
        if($first == 'pages' && $second == 'transaction'){
            $transactionData = (new TransactionController())->index($reservationId);
        }
        if($first == 'pages' && $second == 'invoice'){
            $invoiceData= (new InvoiceController())->index();
        }

        if ($first == "assets")
            return redirect('home');

    return view($first .'.'. $second, ['mode' => $mode, 'demo' => $demo],)
        ->with('calendarData', $calendarData ?? [])
        ->with('propertiesData', $propertiesData ?? [])
        ->with('reservationsData', $reservationsData ?? [])
        ->with('profileData', $profileData ?? [])
        ->with('transactionData', $transactionData ?? [])
        ->with('invoiceData', $invoiceData ?? []);
    }

    /**
     * third level route
     */
    public function thirdLevel(Request $request, $first, $second, $third)
    {


        $mode = $request->query('mode');
        $demo = $request->query('demo');

        if ($first == "assets")
            return redirect('home');

        return view($first . '.' . $second . '.' . $third, ['mode' => $mode, 'demo' => $demo]);
    }
}
