<?php

namespace App\Mail;

use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskAssignedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $task;
    public $user;

    public function __construct(Task $task, User $user)
    {
        $this->task = $task;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('New Task Assigned: ' . $this->task->title)
            // Either of the two lines below is fine; keep ONE.
            ->markdown('emails.task_assigned'); 
            // ->markdown('emails.task_assigned', ['task' => $this->task, 'user' => $this->user]);
    }
}
