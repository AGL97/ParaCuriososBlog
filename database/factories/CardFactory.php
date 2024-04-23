<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $fakeCategories=['Anime','Paisaje','Arte','Astronomia'];

    public function definition(): array
    {
        
        return [
            "title" => fake()->sentence(3),
            "short_description" => fake()->sentence(),
            "description" => fake()->paragraph(),
            "imageRoute" => "image_" . fake()->numberBetween(1,13) . ".jpg",
            "category" => $this->fakeCategories[fake()->numberBetween(0,3)],
            "user_id"  => fake()->numberBetween(1,10)
        ];
    }
}
