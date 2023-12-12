<?php

namespace App\Console\Commands;

use App\Models\Listing;
use Illuminate\Console\Command;

class ListingNullFixCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:listing-null-fix-command';

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
        $this->updateListingField(149389,
            [
                'country'=>'Cyprus',
                'country_code'=>'CY',
                'street'=>'Kahraman Sokak C1',
                'city'=>'Kyrenia',
                'state'=>'Kyrenia',
                'neighbourhood'=>'Ftericha'
            ]);
        $this->updateListingField(152633,
            [
            'country'=>'Cyprus',
            'country_code'=>'CY',
            'street'=>'Cig Sokak B38-3',
            'city'=>'Famagusta',
            'state'=>'Famagusta',
            'neighbourhood'=>'Akanthou'
        ]);
        $this->updateListingField(152885,
            [
            'country'=>'Cyprus',
            'country_code'=>'CY',
            'street'=>'Cig Sokak B29-2',
            'city'=>'Famagusta',
            'state'=>'Famagusta',
            'neighbourhood'=>'Akanthou'
        ]);
        $this->updateListingField(154599,
            [
            'country'=>'Cyprus',
            'country_code'=>'CY',
            'street'=>'Cig Sokak B34-1',
            'city'=>'Famagusta',
            'state'=>'Famagusta',
            'neighbourhood'=>'Akanthou'
        ]);
    }

    /**
     * Updates the listing fields.
     *
     * @param int $listingId
     * @param array $fields
     * @return void
     */
    private function updateListingField(int $listingId, array $fields )
    {
        $listing = Listing::findOrfail($listingId);
        $listing->update($fields);
        $listing->save();
    }
}
