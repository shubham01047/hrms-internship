<?php

namespace App\Mail;

use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TimesheetSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $timesheet;
    public $admin;

    public function __construct(Timesheet $timesheet, ?User $admin = null)
    {
        // Ensure relations are present inside the view
        $this->timesheet = $timesheet->loadMissing(['user', 'task.project']);
        $this->admin     = $admin;
    }

    public function build()
    {
        return $this->subject('New Timesheet Submitted')
            ->markdown('emails.timesheet_submitted'); // points to the blade below
    }
}
