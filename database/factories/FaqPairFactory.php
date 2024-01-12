<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FAQ_Pair>
 */
class FaqPairFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'faq_categories_id' => null, // can be associated later in seeder
            'question' => $this->faker->sentence,
            'answer' => $this->faker->paragraph,
        ];
    }
}
