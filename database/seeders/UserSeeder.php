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
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => 'Password!321',
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@ehb.be',
            'password' => 'Password!321',
        ]);
    }
}