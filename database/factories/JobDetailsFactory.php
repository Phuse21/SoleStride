<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobDetails>
 */
class JobDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_id' => Job::factory(),
            'summary' => fake()->paragraph(),
            'minimum_qualifications' => fake()->word(),
            'experience_level' => fake()->word(),
            'experience_years' => fake()->numberBetween(1, 5),
            'responsibilities' => json_encode(fake()->sentences()),
            'skills' => json_encode(fake()->words()),
        ];
    }

}