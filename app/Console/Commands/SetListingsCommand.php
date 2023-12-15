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
        $this->setListingOwner(138622,'CW Grup');
        $this->setListingOwner(148477,'CW Grup');
        $this->setListingOwner(148460,'CW Grup');
        $this->setListingOwner(148509,'CW Grup');
        $this->setListingOwner(138612,'Zednet');
        $this->setListingOwner(138601,'Rotbraun');
        $this->setListingOwner(138617,'Blue Palm H.S.');
        $this->setListingOwner(138298,'Blue Palm H.S.');
        $this->setListingOwner(138297,'Blue Palm H.S.');
        $this->setListingOwner(138629,'Blue Palm H.S.');
        $this->setListingOwner(138599,'Blue Palm H.S.');
        $this->setListingOwner(138625,'Blue Palm H.S.');
        $this->setListingOwner(138602,'Blue Palm H.S.');
        $this->setListingOwner(138633,'Blue Palm H.S.');
        $this->setListingOwner(138588,'Blue Palm H.S.');
        $this->setListingOwner(138587,'Blue Palm H.S.');
        $this->setListingOwner(156343,'Blue Palm H.S.');
        $this->setListingOwner(136003,'Blue Palm H.S.');
        $this->setListingOwner(138594,'Blue Palm H.S.');
        $this->setListingOwner(138595,'Blue Palm H.S.');
        $this->setListingOwner(138600,'Blue Palm H.S.');
        $this->setListingOwner(138607,'Blue Palm H.S.');
        $this->setListingOwner(138607,'Blue Palm H.S.');
        $this->setListingOwner(138590,'Blue Palm H.S.');
        $this->setListingOwner(138593,'Blue Palm H.S.');
        $this->setListingOwner(138598,'Blue Palm H.S.');
        $this->setListingOwner(138596,'Blue Palm H.S.');
        $this->setListingOwner(138615,'Blue Palm H.S.');
        $this->setListingOwner(138623,'Blue Palm H.S.');
        $this->setListingOwner(138610,'Blue Palm H.S.');
        $this->setListingOwner(138589,'Blue Palm H.S.');
        $this->setListingOwner(138591,'Blue Palm H.S.');
        $this->setListingOwner(138592,'Blue Palm H.S.');
        $this->setListingOwner(138603,'Blue Palm H.S.');
        $this->setListingOwner(114825,'Blue Palm H.S.');
        $this->setListingOwner(138586,'Blue Palm H.S.');
        $this->setListingOwner(138608,'Blue Palm H.S.');
        $this->setListingOwner(138597,'Blue Palm H.S.');
        $this->setListingOwner(138604,'Blue Palm H.S.');
        $this->setListingOwner(138620,'Blue Palm H.S.');
        $this->setListingOwner(138605,'Blue Palm H.S.');
        $this->setListingOwner(138585,'Blue Palm H.S.');
        $this->setListingOwner(138616,'Blue Palm H.S.');
        $this->setListingOwner(138630,'Blue Palm H.S.');
        $this->setListingOwner(138632,'Blue Palm H.S.');
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
