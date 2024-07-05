<?php

namespace Database\Factories;

use App;
use App\Models\Applicants;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobApplications>
 */
class JobApplicationsFactory extends Factory
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
            'applicant_id' => Applicants::factory(),
            'cv_path' => fake()->word(),
            'status' => fake()->word(),
            'application_date' => now(),
        ];
    }
}
