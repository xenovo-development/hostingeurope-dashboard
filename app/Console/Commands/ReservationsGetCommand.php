<?php

namespace App\Console\Commands;

use App\Models\Listing;
use App\Models\Reservation;
use GuzzleHttp;
use Illuminate\Console\Command;
use Termwind\Components\Li;

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

            foreach ($data['reservations'] as $reservation) {
                $listing = Listing::find($reservation['listing_id']);
                    if ($listing) {
                        Reservation::where('listing_id', $reservation['listing_id'])->firstOrCreate([
                            'currency' => $reservation['currency'],
                            'price_per_night' => $reservation['price_per_night'],
                            'base_price' => $reservation['base_price'],
                            'security_price' => $reservation['security_price'],
                            'extras_price' => $reservation['extras_price'],
                            'extras_price_ex' => $reservation['extras_price'],
                            'extras_price_inc' => $reservation['extras_price_inc'],
                            'cancellation_fee' => $reservation['cancellation_fee'],
                            'tax_amount' => $reservation['tax_amount'],
                            'collected_tax' => $reservation['collected_tax'],
                            'host_collected_tax' => $reservation['host_collected_tax'],
                            'cleaning_fee' => $reservation['cleaning_fee'],
                            'channel_commission' => $reservation['channel_commission'],
                            'service_charge' => $reservation['service_charge'],
                            'subtotal' => $reservation['subtotal'],
                            'revenue' => $reservation['revenue'],
                            'transaction_fee' => $reservation['transaction_fee'],
                            'sum_refunds' => $reservation['sum_refunds'],
                            'owner_revenue' => $reservation['owner_revenue'],
                            'net_revenue' => $reservation['net_revenue'],
                            'source' => $reservation['source'],
                            'status' => $reservation['status'],
                            'confirmation_code' => $reservation['confirmation_code'],
                            'nights' => $reservation['nights'],
                            'checkIn' => $reservation['checkIn'],
                            'checkOut' => $reservation['checkOut'],
                            'guests' => $reservation['guests'],
                            'adults' => $reservation['adults'],
                            'children' => $reservation['children'],
                            'infants' => $reservation['infants'],
                            'pets' => $reservation['pets'],
                            'confirmed_at' => $reservation['confirmed_at'],
                            'advance_days' => $reservation['advance_days'],
                            'cancel_policy' => $reservation['cancel_policy'],
                            'planned_arrival' => $reservation['planned_arrival'],
                            'planned_departure' => $reservation['planned_departure'],
                            'beds_to_be_prepared' => $reservation['beds_to_be_prepared'],
                            'notes' => $reservation['notes'],
                            'extra_info' => $reservation['extra_info'],
                            'cancel_penalty' => $reservation['cancel_penalty'],
                            'cleaning_notes' => $reservation['cleaning_notes'],
                            'guest_details' => $reservation['guest_details'],
                            'price_details' => $reservation['price_details'],
                            'addons_details' => $reservation['addons_details'],
                            'addons_price' => $reservation['addons_price'],
                            'added_by' => $reservation['added_by'],
                            'updated_at' => $reservation['updated_at'],
                            'cancelled_at' => $reservation['cancelled_at'],
                            'payout_price' => $reservation['payout_price'],
                            'payout_by_channel' => $reservation['payout_by_channel'],
                            'created_at' => $reservation['created_at'],
                            'city_tax' => $reservation['city_tax'],
                            'channel_reservation_id' => $reservation['channel_reservation_id'],
                            'listing_id' => $reservation['listing_id'],
                            'listing_nickname' => $reservation['listing_nickname'],
                            'channel_listing_id' => $reservation['channel_listing_id'],
                            'listing_channel_id' => $reservation['listing_channel_id'],
                            'guest_name' => $reservation['guest_name'],
                            'guest_email' => $reservation['guest_email'],
                            'guest_phone' => $reservation['guest_phone'],
                            'guest_photo' => $reservation['guest_photo'],
                            'guest_location' => $reservation['guest_location'],
                            'guest_languages' => $reservation['guest_languages'],
                            'integration_id' => $reservation['integration_id'],
                            'integration_nickname' => $reservation['integration_nickname'],
                            'integration_name' => $reservation['integration_name'],
                            'integration_type' => $reservation['integration_type'],
                            'tags' =>json_encode($reservation['tags'],true),
                            'checked_in_mark' => $reservation['checked_in_mark'],
                            'checked_out_mark' => $reservation['checked_out_mark'],
                            'hostify_id' => $reservation['id'],
                            'paid_part' => $reservation['paid_part'],
                            'paid_sum' => $reservation['paid_sum'],
                            'is_manual' => $reservation['is_manual'],
                            'message_id' => $reservation['message_id'],
                            'guest_id' => $reservation['guest_id'],
                            'parent_listing_id' => $reservation['parent_listing_id'],
                            'listing_title' => $reservation['listing_title'],
                            'listing_photo' => $reservation['listing_photo'],
                            'integration_photo' => $reservation['integration_photo'],
                            'custom_fields' => json_encode($reservation['custom_fields'],true),
                            'vat_amount' => $reservation['vat_amount'],
                        ]);
                    }
                }
            if (!$data['reservations']) {
                break;
            }
            $page++;
        }
    }

}
