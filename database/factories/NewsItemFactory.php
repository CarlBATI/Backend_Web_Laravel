<?php

namespace Database\Factories;

use App\Models\NewsItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsItems>
 */
class NewsItemFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewsItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            // implode("\n\n", ...) joins paragraphs together with two newline characters (\n\n) between each paragraph.
            'content' => implode("\n\n", $this->faker->paragraphs($this->faker->numberBetween(1, 20))),
            'publishing_date' => $this->faker->dateTimeThisYear,
        ];
    }
}
