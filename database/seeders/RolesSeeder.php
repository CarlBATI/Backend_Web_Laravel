<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncateTables([
            'roles',
            'role_user',
            'users'
        ]);

        $roles = [
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'user'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
    private function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }      
}
