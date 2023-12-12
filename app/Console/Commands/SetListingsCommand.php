<?php

namespace App\Console\Commands;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Console\Command;

class SetListingsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-listings-command';

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
        $this->setListingOwner(149389,'Danny Hinken');
        $this->setListingOwner(152885,'Dorit Lehmann');
        $this->setListingOwner(152633,'Petra Lehmann');
        $this->setListingOwner(154599,'Petra Lehmann');
    }

    /**
     * Sets listings owner for the given owner name and listing id.
     *
     * @param int $listingId
     * @param string $ownerName
     * @return void
     */
    private function setListingOwner(int $listingId, string $ownerName): void
    {
       $user = User::where('name',$ownerName)->firstOrFail();
       $userApt = Listing::findOrFail($listingId);
       $userApt->user_id = $user['id'];
       $userApt->save();
    }
}
