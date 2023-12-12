<?php

namespace App\Console\Commands;

use App\Models\User;
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
            'commission'=>'0',
            'email' => 'admin@hostingeurope.info',
            'phone'=>'+90-555-555-5555',
            'email_verified_at' => now(),
            'password' => '$2a$12$Q6gSOr1PW.oOW3LzAH9psu3i5uu.607AVOWhE2zr3JXLcce8G.EAu',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Test',
            'role' => 'Admin',
            'commission'=>'0',
            'email' => 'test@hostingeurope.info',
            'phone'=>'+90-555-555-5555',
            'email_verified_at' => now(),
            'password' => '$2a$12$Q6gSOr1PW.oOW3LzAH9psu3i5uu.607AVOWhE2zr3JXLcce8G.EAu',
            'remember_token' => Str::random(10),
        ]);

        /**
         * Hosts
         */
        User::create([
            'name' => 'Danny Hinken',
            'role' => 'Host',
            'commission'=>'22',
            'email' => 'dannyhinken@hostingeurope.info',
            'phone'=>'+49-163-668-8881',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Petra Lehmann',
            'role' => 'Host',
            'commission'=>'15',
            'email' => 'petralehmann@hostingeurope.info',
            'phone'=>'+49-1522-259-6649',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Dorit Lehmann',
            'role' => 'Host',
            'commission'=>'15',
            'email' => 'doritlehmann@hostingeurope.info',
            'phone'=>'+49-1577-741-9050',
            'email_verified_at' => now(),
            'password' => '$2a$12$m6ylt81EtCj1MmjaV/o6suQVZbyDQxg7Cy92x5vFalw/c2Xhx2u5W',
            'remember_token' => Str::random(10),
        ]);
    }
}
