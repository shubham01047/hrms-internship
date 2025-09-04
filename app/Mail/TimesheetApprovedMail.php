<?php

namespace App\Mail;

use App\Models\Timesheet;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TimesheetApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $timesheet;

    public function __construct(Timesheet $timesheet)
    {
        $this->timesheet = $timesheet->loadMissing(['task.project', 'user']);
    }

    public function build()
    {
        return $this->subject('Your Timesheet Has Been Approved')
            ->markdown('emails.timesheet_approved');
    }
}
