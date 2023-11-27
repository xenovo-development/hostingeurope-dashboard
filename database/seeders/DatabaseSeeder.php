<?php

namespace Database\Seeders;

use App\Models\Expenses;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'name' => 'Hosting Europe',
            'role' => 'Admin',
            'commission'=>'0',
            'email' => 'hosting.tr@odsol-host.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$Q6gSOr1PW.oOW3LzAH9psu3i5uu.607AVOWhE2zr3JXLcce8G.EAu',
            'remember_token' => Str::random(10),
        ]);
        User::factory(1)->create([
            'name' => 'Danny Hinken',
            'role' => 'Host',
            'commission'=>'22',
            'email' => 'dannyhinken@hostingeurope.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$Q6gSOr1PW.oOW3LzAH9psu3i5uu.607AVOWhE2zr3JXLcce8G.EAu',
            'remember_token' => Str::random(10),
        ]);
    }
}
