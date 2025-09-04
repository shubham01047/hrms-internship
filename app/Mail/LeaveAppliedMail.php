<?php

namespace App\Mail;

use App\Models\Leave;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeaveAppliedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $leave;

    public function __construct(Leave $leave)
    {
        $this->leave = $leave;
    }

    public function build()
    {
        return $this->subject('New Leave Application Submitted')
            ->markdown('emails.leave_applied');
    }
}
