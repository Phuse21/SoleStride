<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicants>
 */
class ApplicantsFactory extends Factory
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
            'education' => fake()->word(),
            'field' => fake()->word(),
            'street_address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->stateAbbr(),
            'zip' => fake()->postcode(),
            'country' => fake()->countryCode(),
            'phone' => fake()->phoneNumber(),
            'profile_photo' => fake()->imageUrl(640, 480, 'people', true),
            'linkedin' => fake()->url(),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}