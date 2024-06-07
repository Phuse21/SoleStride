<?php
use App\Models\Employer;
use App\Models\Job;

it('belongs to an employer', function () {
    //Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    //Act and Assert
    expect($job->employer->is($employer))->toBeTrue();

});

it('can have many tags', function () {
    //Arrange
    $job = Job::factory()->create();
    $job->tag('laravel');

    expect($job->tags)->toHaveCount(1);
});

// use Tests\TestCase;

// class JobTest extends TestCase
// {
//     public function test_it_belongs_to_an_employer()
//     {
//         // Arrange: Create an Employer instance
//         $employer = Employer::factory()->create();

//         // Act: Create a Job instance associated with the created Employer
//         $job = Job::factory()->create(['employer_id' => $employer->id]);

//         // Assert: Verify that the Job belongs to the Employer
//         $this->assertTrue($job->employer->is($employer));
//     }
// }