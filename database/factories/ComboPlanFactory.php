<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComboPlan>
 */
class ComboPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $planIds = Plan::select('id')->inRandomOrder()->limit(rand(2, 5))->pluck('id')->implode(',');

        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 50, 1000),
            'plan_ids' => $planIds,
        ];
    }
}
