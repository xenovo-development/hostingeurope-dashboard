<?php

namespace App\Console\Commands;

use App\Models\Listing;
use GuzzleHttp;
use Illuminate\Console\Command;

class ListingsGetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:listings-get-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets all of the listings from Hostify API and saves to the database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new GuzzleHttp\Client();
        $baseUrl = 'https://api-rms.hostify.com/listings';
        $page = 1;
        $headers =
            [
                'x-api-key' => 'FuyE21ljFXjwkz7SKMvmHsCGGoZLyf9S'
            ];
        while (true) {
            $url = $baseUrl . '?page=' . $page;
            $response = $client->request('GET', $url, ['headers' => $headers]);
            $data = json_decode($response->getBody(), true);

            foreach ($data['listings'] as $listing) {
                Listing::updateOrCreate(
                    ['id' => $listing['id']],
                    ['fs_integration_type' => $listing['fs_integration_type'],
                    'currency' => $listing['currency'],
                    'channel_listing_id' => $listing['channel_listing_id'],
                    'room_type' => $listing['room_type'],
                    'listing_type' => $listing['listing_type'],
                    'property_type_id' => $listing['property_type_id'],
                    'property_type' => $listing['property_type'],
                    'instant_booking' => $listing['instant_booking'],
                    'name' => $listing['name'],
                    'updated_at' => $listing['updated_at'],
                    'nickname' => $listing['nickname'],
                    'security_deposit' => $listing['security_deposit'],
                    'cleaning_fee' => $listing['cleaning_fee'],
                    'pets_fee' => $listing['pets_fee'],
                    'extra_person' => $listing['extra_person'],
                    'guest_included' => $listing['guests_included'],
                    'default_daily_price' => $listing['default_daily_price'],
                    'weekend_price' => $listing['weekend_price'],
                    'weekly_price_factor' => $listing['weekly_price_factor'],
                    'monthly_price_factor' => $listing['monthly_price_factor'],
                    'min_nights' => $listing['min_nights'],
                    'max_nights' => $listing['max_nights'],
                    'checkin_start' => $listing['checkin_start'],
                    'checkin_end' => $listing['checkin_end'],
                    'checkout' => $listing['checkout'],
                    'cancel_policy' => $listing['cancel_policy'],
                    'max_notice_days' => $listing['max_notice_days'],
                    'min_notice_hours' => $listing['min_notice_hours'],
                    'thumbnail_file' => $listing['thumbnail_file'],
                    'is_listed' => $listing['is_listed'],
                    'country' => $listing['country'],
                    'country_code' => $listing['countrycode'],
                    'state' => $listing['state'],
                    'city' => $listing['city'],
                    'zipcode' => $listing['zipcode'],
                    'street' => $listing['street'],
                    'neighbourhood' => $listing['neighbourhood'],
                    'lat' => $listing['lat'],
                    'lng' => $listing['lng'],
                    'timezone_offset' => $listing['timezone_offset'],
                    'timezone' => $listing['timezone'],
                    'price_markup' => $listing['price_markup'],
                    'master_calendar' => $listing['master_calendar'],
                    'person_capacity' => $listing['person_capacity'],
                    'bathrooms' => $listing['bathrooms'],
                    'bathroom_shared' => $listing['bathroom_shared'],
                    'bedrooms' => $listing['bedrooms'],
                    'beds' => $listing['beds'],
                    'area' => $listing['area'],
                    'symbol' => $listing['symbol'],
                    'unicode' => $listing['unicode'],
                    'position' => $listing['position'],
                    'service_pms' => $listing['service_pms'],
                    'integration_nickname' => $listing['integration_nickname'],
                    'integration_photo' => $listing['integration_photo'],
                    'integration_name' => $listing['integration_name'],
                    'price' => $listing['price'],
                    'price_monthly' => $listing['price_monthly'],
                    'tags' => json_encode($listing['tags'], true),
                    'custom_fields' => json_encode($listing['custom_fields'], true),
                    'users' => json_encode($listing['users']),
                    'integration_id' => $listing['integration_id'],
                ]);
            }

            if (!$data['listings']) {
                break;
            }
            $page++;
        }
    }
}
