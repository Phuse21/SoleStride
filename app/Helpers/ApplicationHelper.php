<?php

namespace App\Helpers;

use App\Mail\ApplicationAcceptedMail;
use App\Mail\ApplicationDeclinedMail;
use App\Models\JobApplications;
use App\Notifications\ApplicationAcceptedNotification;
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


    public static function acceptApplication(JobApplications $application)
    {
        //update application status
        $application->update([
            'status' => 'accepted',
        ]);

        //send email
        Mail::to($application->applicants->user)->queue(new ApplicationAcceptedMail($application));

        //send notification
        $application->applicants->user->notify(new ApplicationAcceptedNotification($application));
    }
}