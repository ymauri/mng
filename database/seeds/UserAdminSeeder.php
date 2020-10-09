<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserAdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Admin',
                'email' => 'info@log.towerleisure.nl',
                'email_verified_at' => now(),
                'password' => 'passwd', // password
                'remember_token' => Str::random(10),
            ]
        );
    }
}
