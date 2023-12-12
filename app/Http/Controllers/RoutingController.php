<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ImpersonateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $mode = $request->query('mode');
        $demo = $request->query('demo');

        $date = $request->query('date');
        $userId = $request->query('userId');

        switch ($first) {
            case 'index' :
                $dashboardData = (new UserDashboardController)->index($date ?? null);
                break;
            case 'impersonate':
                return (new ImpersonateController())->impersonate($userId);
        }

        if ($first == "assets")
            return redirect('home');

        return view($first, ['mode' => $mode, 'demo' => $demo])
            ->with('dashboardData', $dashboardData);
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

        $caseKey = $first . '/' . $second;

        switch ($caseKey) {
            case 'apps/calendar':
                $calendarData = (new CalendarController)->index();
                break;

            case 'pages/properties':
                $propertiesData = (new ListingController())->index();
                break;

            case 'pages/listings':
                $listingData = (new AdminController())->listingIndex();
                break;

            case 'pages/reservations':
                $reservationsData = (new ReservationsController())->index($listingId);
                break;

            case 'pages/profile':
                $profileData = (new ProfileChartController())->index();
                break;

            case 'pages/transaction':
                $transactionData = (new TransactionController())->index($reservationId);
                break;

            case 'pages/invoice':
                $invoiceData = (new InvoiceController())->index();
                break;

            case 'pages/analytics':
                $analyticsData = (new AnalyticsController())->index($listingId);
                break;
        }

        if ($first == "assets")
            return redirect('home');

        return view($first . '.' . $second, ['mode' => $mode, 'demo' => $demo],)
            ->with('calendarData', $calendarData ?? [])
            ->with('propertiesData', $propertiesData ?? [])
            ->with('listingData', $listingData ?? [])
            ->with('reservationsData', $reservationsData ?? [])
            ->with('profileData', $profileData ?? [])
            ->with('transactionData', $transactionData ?? [])
            ->with('invoiceData', $invoiceData ?? [])
            ->with('analyticsData', $analyticsData ?? []);
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
