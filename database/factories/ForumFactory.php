<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum>
 */
class ForumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => fake()->paragraph(10),
            'maxPresent' => $this->faker->randomNumber(),
            'designedTo' => 'Students',
            'tags' => 'SPORT,MUSIC,FOOD',
            'date' => $this->faker->date(),
            'owner' => 'jasser',
            'active' => $this->faker->boolean(),
        ];
    }
}
