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
       // Define the IDs and names
        $categories = [
            1 => 'documentation',
            2 => 'code',
            // Add categories as needed
        ];

        // Delete and create the categories
        foreach ($categories as $id => $name) {
            // Delete the category with the current ID
            AboutCategory::find($id)?->delete();

            // Create the category with the current ID and name
            AboutCategory::create(['id' => $id, 'name' => $name]);
        } 
    }
}
