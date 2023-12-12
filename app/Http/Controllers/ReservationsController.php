<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Reservation;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp;


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
        $listing = Listing::find($listing_id);
        $reservations = Reservation::where('listing_id',$listing_id)->orderBy('checkIn','ASC')->paginate(50);

         return[
             'listing'=>$listing,
             'reservations'=>$reservations
         ];
    }

    /**
     * Create a new reservation instance & send a new reservation instance to the Hostify servers.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws GuzzleException
     */
    public function store(Request $request): RedirectResponse
    {
        $listing = Listing::where('street',$request['listing-select'])->firstOrFail();
        $dates = explode(',',$request['date']);
        $user = Auth::user();
        $client = new GuzzleHttp\Client();
        $url = 'https://api-rms.hostify.com/reservations';
        $headers =
            [
                'x-api-key' => 'FuyE21ljFXjwkz7SKMvmHsCGGoZLyf9S',
            ];
        $params = [
            'listing_id'=>$listing['id'],
            'start_date'=>$dates[0],
            'end_date'=>$dates[1],
            'guests'=>0,
            'pets'=>0,
            'name'=>$request['name'],
            'email'=>Auth::user()['email'],
            'phone'=>Auth::user()['phone'],
            'total_price'=>0,
            'status'=>'accepted',
            'source'=>'Direct',
            'channel_commission'=>0,
            'skip_restrictions'=>true,
        ];
        $response = $client->request('POST', $url, ['headers' => $headers,'json'=>$params]);
        $data = json_decode($response->getBody(), true);

        $reservation = new Reservation();

        $reservation->fill([
            'id'=>$data['reservation']['id'],
            'currency'=>$data['reservation']['currency'],
            'price_per_night'=>$data['reservation']['price_per_night'],
            'base_price'=>$data['reservation']['base_price'],
            'security_price'=>$data['reservation']['security_price'],
            'cleaning_fee'=>$data['reservation']['cleaning_fee'],
            'channel_commission'=>$data['reservation']['channel_commission'],
            'service_charge'=>$data['reservation']['service_charge'],
            'subtotal'=>$data['reservation']['subtotal'],
            'payout_price'=>$data['reservation']['payout_price'],
            'transaction_fee'=>$data['reservation']['transaction_fee'],
            'sum_refunds'=>$data['reservation']['sum_refunds'],
            'revenue'=>$data['reservation']['revenue'],
            'owner_revenue'=>$data['reservation']['owner_revenue'],
            'net_revenue'=>$data['reservation']['net_revenue'],
            'channel_reservation_id'=>$data['reservation']['channel_reservation_id'],
            'source'=>$data['reservation']['source'],
            'status_code'=>$data['reservation']['status_code'],
            'status'=>$data['reservation']['status'],
            'status_description'=>$data['reservation']['status_description'],
            'confirmation_code'=>$data['reservation']['confirmation_code'],
            'nights'=>$data['reservation']['nights'],
            'checkIn'=>$data['reservation']['checkIn'],
            'checkOut'=>$data['reservation']['checkOut'],
            'guests'=>$data['reservation']['guests'],
            'guest_name'=>$request['name'],
            'adults'=>$data['reservation']['adults'],
            'confirmed_at'=>$data['reservation']['confirmed_at'],
            'updated_at'=>$data['reservation']['updated_at'],
            'is_manual'=>$data['reservation']['is_manual'],
            'listing_id'=>$data['reservation']['listing_id'],
        ]);
       $listing->reservations()->save($reservation);
       $user['days'] -= $data['reservation']['nights'];
       $user->save();

       return back()->with('success', 'Reservation created!');
    }
}
