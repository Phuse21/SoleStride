<?php

namespace App\Helpers;

use App\Mail\ApplicationDeclinedMail;
use App\Models\JobApplications;
use App\Notifications\ApplicationDeclinedNotification;
use Illuminate\Support\Facades\Mail;


class ApplicationHelper
{

    public static function declineApplication(JobApplications $application)
    {
        //update application status
        $application->update([
            'status' => 'declined',
        ]);

        // Send email
        Mail::to($application->applicants->user)->queue(new ApplicationDeclinedMail($application));

        // Send notification
        $application->applicants->user->notify(new ApplicationDeclinedNotification($application));


    }
}