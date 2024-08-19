<?php

namespace App\Helpers;

use App\Mail\ApplicationAcceptedMail;
use App\Mail\ApplicationDeclinedMail;
use App\Models\JobApplications;
use App\Notifications\ApplicationAcceptedNotification;
use App\Notifications\ApplicationDeclinedNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class ApplicationHelper
{

    public static function declineApplication(JobApplications $application)
    {
        // Batch related updates if possible
        DB::transaction(function () use ($application) {
            $application->update(['status' => 'declined']);

            $user = $application->applicants->user;

            // Send email and notification together if possible
            Mail::to($user)->queue(new ApplicationDeclinedMail($application));
            $user->notify(new ApplicationDeclinedNotification($application));
        });

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