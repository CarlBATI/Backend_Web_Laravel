<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutLink;

class AboutLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutLink::create(['url' => 'https://laravel.com/docs/10.x', 'text' => 'Laravel 10.x Documentation', 'about_category_id' => 1]);
        AboutLink::create(['url' => 'https://tailwindcss.com/', 'text' => 'TailwindCSS', 'about_category_id' => 1]);
    }
}
