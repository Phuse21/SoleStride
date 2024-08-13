<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->company,
            'position' => fake()->jobTitle(),
            'company_country' => fake()->country(),
            'company_phone' => fake()->phoneNumber(),
            'company_street_address' => fake()->address(),
            'company_state' => fake()->city(),
            'company_city' => fake()->city(),
            'company_zip' => fake()->postcode(),
            'url' => fake()->url(),
            'logo' => $this->faker->imageUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}