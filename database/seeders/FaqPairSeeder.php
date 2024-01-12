<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\FaqPair;

class FaqPairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FaqCategory::all()->each(function ($category) {
            FaqPair::factory(random_int(1, 5))->create(['faq_categories_id' => $category->id]);
        });
    }
}
