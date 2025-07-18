<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference_id' => 'OL-' . now()->format('dmY') . '-' . $this->faker->unique()->numerify('####'),
            'user_id' => 2,
            'total_amount' => $this->faker->numberBetween(1000, 500000),
            'type' => $this->faker->randomElement(['government', 'walk_in', 'project_based', 'online']),
            'status' => $this->faker->randomElement(['pending', 'completed', 'expired']),
            'expiry_date' => $this->faker->dateTimeBetween('-1 month', '+3 days')?->format('Y-m-d'),
        ];
    }
}
