<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use App\Models\Transaction;
use Illuminate\Console\Command;

class DatabaseRefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:database-refresh-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshes the database with the updated values from Hostify API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('app:listings-get-command');
        $this->call('app:reservations-get-command');
        $this->call('app:transactions-get-command');
    }
}
