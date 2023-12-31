<?php

namespace App\Console\Commands;

use App\Models\Listing;
use App\Models\Reservation;
use App\Models\Transaction;
use Illuminate\Console\Command;
use GuzzleHttp;

class TransactionsGetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:transactions-get-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets all transactions from Hostify API and saves it to database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new GuzzleHttp\Client();
        $baseUrl = 'https://api-rms.hostify.com/transactions';
        $page = 1;
        $headers =
            [
                'x-api-key' => 'FuyE21ljFXjwkz7SKMvmHsCGGoZLyf9S'
            ];

        while (true) {
            $url = $baseUrl . '?page=' . $page;
            $response = $client->request('GET', $url, ['headers' => $headers]);
            $data = json_decode($response->getBody(),true);

            foreach ($data['transactions'] as $transaction) {
                $reservation = Reservation::where('hostify_id', $transaction['reservation_id'])->first();
                if($reservation){
                    Transaction::updateOrCreate(
                        ['id' => $transaction['id'],],
                        [
                            'channel_transaction_id'=>$transaction['channel_transaction_id'],
                            'currency'=>$transaction['currency'],
                            'amount'=>$transaction['amount'],
                            'type'=>$transaction['type'],
                            'type_description'=>$transaction['type_description'],
                            'charge_type'=>$transaction['charge_type'],
                            'charge_status'=>$transaction['charge_status'],
                            'arrival_date'=>$transaction['arrival_date'],
                            'charge_date'=>$transaction['charge_date'],
                            'is_completed'=>$transaction['is_completed'],
                            'code'=>$transaction['code'],
                            'details'=>$transaction['details'],
                            'notes'=>$transaction['notes'],
                            'payout_type'=>$transaction['payout_type'],
                            'source'=>$transaction['source'],

                            'listing_id'=>$reservation->listing->id,
                            'reservation_id'=>$reservation['id'],
                        ]);
                }
            }

            if (!$data['transactions']) {
                break;
            }
            $page++;
        }
    }
}
