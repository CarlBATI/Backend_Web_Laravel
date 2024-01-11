<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Define the email addresses
        $emails = ['admin@ehb.be', 'user@ehb.be'];

        // Delete the users with the specified email addresses
        foreach ($emails as $email) {
            User::where('email', $email)->delete();
        }

        // Create the users
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@ehb.be',
            'password' => bcrypt('Password!321'),
        ]);
    }
}