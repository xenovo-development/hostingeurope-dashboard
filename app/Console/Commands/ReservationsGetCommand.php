<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use GuzzleHttp;
use Illuminate\Console\Command;

class ReservationsGetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reservations-get-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new GuzzleHttp\Client();
        $baseUrl = 'https://api-rms.hostify.com/reservations';
        $page = 1;
        $headers =
            [
                'x-api-key' => 'FuyE21ljFXjwkz7SKMvmHsCGGoZLyf9S'
            ];
        while (true) {
            $url = $baseUrl.'?page='.$page;
            $response = $client->request('GET', $url, ['headers' => $headers]);
            $data =json_decode($response->getBody(),true);

            foreach ($data['reservations'] as $reservation){
                Reservation::where('listing_id',$reservation['listing_id'])->firstOrCreate([
                    'currency'=>$reservation['currency'],
                    'price_per_night'=>$reservation['price_per_night'],
                    'base_price'=>$reservation['base_price'],
                    'security_price'=>$reservation['security_price'],
                    'extras_price'=>$reservation['extras_price'],
                    'cancellation_fee'=>$reservation['cancellation_fee'],
                    'tax_amount'=>$reservation['tax_amount'],
                    'collected_tax'=>$reservation['collected_tax'],
                    'host_collected_tax'=>$reservation['host_collected_tax'],
                    'cleaning_fee'=>$reservation['cleaning_fee'],
                    'channel_commission'=>$reservation['channel_commission'],
                    'service_charge'=>$reservation['service_charge'],
                    'subtotal'=>$reservation['subtotal'],
                    'revenue'=>$reservation['revenue'],
                    'transaction_fee'=>$reservation['transaction_fee'],
                    'sum_refunds'=>$reservation['sum_refunds'],
                    'owner_revenue'=>$reservation['owner_revenue'],
                    'net_revenue'=>$reservation['net_revenue'],
                    'source'=>$reservation['source'],
                    'status'=>$reservation['status'],
                    'nights'=>$reservation['nights'],
                    'checkIn'=>$reservation['checkIn'],
                    'checkOut'=>$reservation['checkOut'],
                    'guests'=>$reservation['guests'],
                    'adults'=>$reservation['adults'],
                    'infants'=>$reservation['infants'],
                    'pets'=>$reservation['pets'],
                    'confirmed_at'=>$reservation['confirmed_at'],
                    'advance_days'=>$reservation['advance_days'],
                    'planned_arrival'=>$reservation['planned_arrival'],
                    'notes'=>$reservation['notes'],
                    'extra_info'=>$reservation['extra_info'],
                    'payout_price'=>$reservation['payout_price'],
                    'city_tax'=>$reservation['city_tax'],
                    'listing_id'=>$reservation['listing_id'],
                    'listing_nickname'=>$reservation['listing_nickname'],
                    'guest_name'=>$reservation['guest_name'],
                    'guest_email'=>$reservation['guest_email'],
                    'integration_id'=>$reservation['integration_id'],
                    'integration_name'=>$reservation['integration_name'],
                    'paid_sum'=>$reservation['paid_sum'],
                    'is_manual'=>$reservation['is_manual'],
                    'listing_title'=>$reservation['listing_title'],
                    'listing_photo'=>$reservation['listing_photo'],
                ]);
            }

            if (!$data['reservations']) {
                break;
            }
            $page++;
        }
    }

}
