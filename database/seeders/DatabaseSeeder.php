<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(1)->create([
            'name' => 'Hosting Europe',
            'email' => 'hosting.tr@odsol-host.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$Q6gSOr1PW.oOW3LzAH9psu3i5uu.607AVOWhE2zr3JXLcce8G.EAu',
            'remember_token' => Str::random(10),
        ]);
    }
}
