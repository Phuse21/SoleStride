<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => '$' . number_format(fake()->numberBetween(10000, 100000)),
            'country' => fake()->country(),
            'state' => fake()->city(),
            'city' => fake()->city(),
            'schedule' => Arr::random(['full-time', 'part-time']),
            'mode' => Arr::random(['On-site', 'Remote', 'Hybrid']),
            'url' => fake()->url(),
            'featured' => false,

        ];
    }
}