<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name(),
            'username' => 'carlcustomer',
            'phone_number' => $this->faker->unique()->numerify('9#########'),
            'password' => Hash::make('CarlMadrigal05'),
            'role' => 'customer',
        ];
    }

    public function admin(): static
    {
        return $this->state(fn () => [
            'role' => 'admin',
            'username' => 'carladmin',
        ]);
    }

    public function customer(): static
    {
        return $this->state(fn () => [
            'role' => 'customer',
            'username' => 'carlcustomer',
        ]);
    }

    public function cashier(): static
    {
        return $this->state(fn () => [
            'role' => 'cashier',
            'username' => 'carlcashier',
        ]);
    }

    public function technician(): static
    {
        return $this->state(fn () => [
            'role' => 'technician',
            'username' => 'carltechnician',
        ]);
    }

    public function adminOfficer(): static
    {
        return $this->state(fn () => [
            'role' => 'admin_officer',
            'username' => 'carladminofficer',
        ]);
    }
}
