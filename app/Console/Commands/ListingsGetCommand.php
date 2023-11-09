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
            $url = $baseUrl.'?page='.$page;
            $response = $client->request('GET', $url, ['headers' => $headers]);
            $data =json_decode($response->getBody(),true);

            foreach ($data['listings'] as $listing){
                Listing::where('listing_id',$listing['id'])->firstOrCreate([
                    'listing_id'=>$listing['id'],
                    'property_type'=>$listing['property_type'],
                    'name'=>$listing['name'],
                    'nickname'=>$listing['nickname'],
                    'cleaning_fee'=>$listing['cleaning_fee'],
                    'extra_person'=>$listing['extra_person'],
                    'guest_included'=>$listing['guests_included'],
                    'default_daily_price'=>$listing['default_daily_price'],
                    'weekend_price'=>$listing['weekend_price'],
                    'min_nights'=>$listing['min_nights'],
                    'max_nights'=>$listing['max_nights'],
                    'checkin_start'=>$listing['checkin_start'],
                    'checkin_end'=>$listing['checkin_end'],
                    'checkout'=>$listing['checkout'],
                    'thumbnail_file'=>$listing['thumbnail_file'],
                    'is_listed'=>$listing['is_listed'],
                    'country'=>$listing['country'],
                    'country_code'=>$listing['countrycode'],
                    'state'=>$listing['state'],
                    'city'=>$listing['city'],
                    'zipcode'=>$listing['zipcode'],
                    'street'=>$listing['street'],
                    'neighborhood'=>$listing['neighbourhood'],
                    'bedrooms'=>$listing['bedrooms'],
                    'beds'=>$listing['beds'],
                    'symbol'=>$listing['symbol'],
                    'unicode'=>$listing['unicode'],
                    'integration_photo'=>$listing['integration_photo'],
                    'integration_name'=>$listing['integration_name'],
                    'price'=>$listing['price'],
                    'price_monthly'=>$listing['price_monthly'],
                    'user_id'=>1
                ]);
            }

            if (!$data['listings']) {
                break;
            }
            $page++;
        }
    }
}
