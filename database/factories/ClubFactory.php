<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'logo' => $this->faker->word,
            'website' => $this->faker->word,
            'email' => $this->fake->safeEmail(),
        ];
    }
}
