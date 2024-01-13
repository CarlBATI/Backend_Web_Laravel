<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Define the users and their roles
        $users = [
            ['name' => 'admin', 'email' => 'admin@ehb.be', 'role' => 'admin', 'password' => bcrypt('Password!321'), 'birthday' => '1998-01-01'],
            ['name' => 'user', 'email' => 'user@ehb.be', 'role' => 'user', 'password' => bcrypt('Password!321'), 'birthday' => '1998-01-01'],
        ];

        // Delete the users with the specified email addresses
        foreach ($users as $user) {
            User::where('email', $user['email'])->delete();
        }

        // Create the users and assign the roles
        foreach ($users as $user) {
            $createdUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'birthday' => $user['birthday'],
            ]);

            $role = Role::where('name', $user['role'])->first();
            $createdUser->roles()->attach($role);
        }
    }
}