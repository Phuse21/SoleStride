<?php

namespace Database\Seeders;

use App\Models\Applicants;
use App\Models\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_types = ['Applicants', 'Employer'];
        for ($i = 0; $i < 10; $i++) {
            $user_type = fake()->randomElement($user_types);
            User::factory()->create(
                [
                    'role' => $user_type
                ]
            );

            if ($user_type == 'Employer') {

                Employer::factory()->create();
            } else {
                Applicants::factory()->create();
            }
        }
    }
}