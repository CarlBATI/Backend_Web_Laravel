<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutCategory;

class AboutCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutCategory::create(['id' => 1, 'name' => 'documentation']);
        AboutCategory::create(['id' => 2, 'name' => 'code']);
    }
}
