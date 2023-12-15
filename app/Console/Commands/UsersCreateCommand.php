<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class UsersCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:users-create-command';

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
        /**
         * Admins
         */
        User::create([
            'name' => 'Admin',
            'role' => 'Admin',
            'commission' => '0',
            'email' => 'admin@hostingeurope.info',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'phone' => '+90-555-555-5555',
            'email_verified_at' => now(),
            'password' => '$2a$12$Q6gSOr1PW.oOW3LzAH9psu3i5uu.607AVOWhE2zr3JXLcce8G.EAu',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Test',
            'role' => 'Admin',
            'commission' => '0',
            'email' => 'test@hostingeurope.info',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'phone' => '+90-555-555-5555',
            'email_verified_at' => now(),
            'password' => '$2a$12$Q6gSOr1PW.oOW3LzAH9psu3i5uu.607AVOWhE2zr3JXLcce8G.EAu',
            'remember_token' => Str::random(10),
        ]);

        /**
         * Manager
         */
        User::create([
            'name' => 'Gökay',
            'role' => 'Manager',
            'commission' => '0',
            'email' => 'em1.2@odsol-mail.com',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'phone' => '+90-555-555-5555',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);

        /**
         *Accounting
         */
        User::create([
            'name' => 'İrem',
            'role' => 'Accounting',
            'commission' => '0',
            'email' => 'em1.4@odsol-mail.com',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'phone' => '+90-555-555-5555',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Berke',
            'role' => 'Accounting',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'commission' => '0',
            'email' => 'em1.10@odsol-mail.com',
            'phone' => '+90-555-555-5555',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Elif',
            'role' => 'Accounting',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'commission' => '0',
            'email' => 'em1.15@odsol-mail.com',
            'phone' => '+90-555-555-5555',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);

        /**
         * Sales
         */
        User::create([
            'name' => 'Mihrimah',
            'role' => 'Sales',
            'commission' => '0',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'email' => 'em1.3@odsol-mail.com',
            'phone' => '+90-555-555-5555',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Seda',
            'role' => 'Sales',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'commission' => '0',
            'email' => 'em1.9@odsol-mail.com',
            'phone' => '+90-555-555-5555',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);

        /**
         * Hosts
         */
        User::create([
            'name' => 'Danny Hinken',
            'role' => 'Host',
            'commission' => '22',
            'email' => 'dannyhinken@hostingeurope.info',
            'phone' => '+49-163-668-8881',
            'contract_start'=>Carbon::create(2023,10,10),
            'contract_end'=>Carbon::create(2024,12,12),
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Petra Lehmann',
            'role' => 'Host',
            'commission' => '15',
            'email' => 'petralehmann@hostingeurope.info',
            'contract_start'=>Carbon::create(2023,10,10),
            'contract_end'=>Carbon::create(2024,12,12),
            'phone' => '+49-1522-259-6649',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Dorit Lehmann',
            'role' => 'Host',
            'commission' => '15',
            'email' => 'doritlehmann@hostingeurope.info',
            'contract_start'=>Carbon::create(2023,10,10),
            'contract_end'=>Carbon::create(2024,12,12),
            'phone' => '+49-1577-741-9050',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Blue Palm H.S.',
            'role' => 'Host',
            'commission' => '0',
            'email' => 'bphs@hostingeurope.info',
            'contract_start'=>Carbon::create(2023,10,10),
            'contract_end'=>Carbon::create(2024,12,12),
            'phone' => '+55-5555-555-5555',
            'email_verified_at'=>now(),
            'password'=>'$2a$12$C2APQKYQScQX/4bX9.HGkuyifeBew3vVtgoBc06T4avB7Fh.eKVha'
        ]);
        User::create([
            'name' => 'CW Grup',
            'role' => 'Host',
            'commission' => '0',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'email' => 'tr23121@hostingeurope.info',
            'phone' => '+55-5555-555-5555',
            'email_verified_at'=>now(),
            'password'=>'$2a$12$C2APQKYQScQX/4bX9.HGkuyifeBew3vVtgoBc06T4avB7Fh.eKVha'
        ]);
        User::create([
            'name' => 'Zednet',
            'role' => 'Host',
            'commission' => '0',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'email' => 'at23122@hostingeurope.info',
            'phone' => '+55-5555-555-5555',
            'email_verified_at'=>now(),
            'password'=>'$2a$12$C2APQKYQScQX/4bX9.HGkuyifeBew3vVtgoBc06T4avB7Fh.eKVha'
        ]);
        User::create([
            'name' => 'Rotbraun',
            'role' => 'Host',
            'commission' => '0',
            'contract_start'=>Carbon::create(2020,01,01),
            'contract_end'=>Carbon::create(2094,12,12),
            'email' => 'at23121@hostingeurope.info',
            'phone' => '+55-5555-555-5555',
            'email_verified_at'=>now(),
            'password'=>'$2a$12$C2APQKYQScQX/4bX9.HGkuyifeBew3vVtgoBc06T4avB7Fh.eKVha'
        ]);
    }
}
