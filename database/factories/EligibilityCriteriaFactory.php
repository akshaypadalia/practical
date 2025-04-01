<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EligibilityCriteria>
 */
class EligibilityCriteriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'age_less_than' => $this->faker->numberBetween(10, 20),
            'age_greater_than' => $this->faker->numberBetween(20, 60),
            'last_login_days_ago' => $this->faker->numberBetween(1, 30),
            'income_less_than' => $this->faker->randomFloat(2, 20, 200),
            'income_greater_than' => $this->faker->randomFloat(2, 20, 200),
        ];
    }
}
