<?php

namespace Database\Seeders;

use App\Models\Applicants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Applicants::factory(10)->create();
    }
}