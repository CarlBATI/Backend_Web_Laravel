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
        $links = [
            ['url' => 'https://laravel.com/docs/10.x', 'text' => 'Laravel 10.x Documentation', 'about_category_id' => 1],
            ['url' => 'https://laravel.com/api/10.x/', 'text' => 'Laravel 10.x API Documentation', 'about_category_id' => 1],
            ['url' => 'https://tailwindcss.com/', 'text' => 'TailwindCSS', 'about_category_id' => 1],
            ['url' => 'https://dev.to/dalelantowork/laravel-8-api-resources-for-beginners-2cpa', 'text' => 'Article: api-resources-for-beginners', 'about_category_id' => 1],
        ];

        foreach ($links as $link) {
            AboutLink::create($link);
        }
    }
}
