<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\DailyUpdateReminderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendDailyUpdateReminders extends Command
{
    protected $signature = 'reminders:daily-updates';
    protected $description = 'Send daily update reminder emails to all users (Mon–Fri, 5:30 PM)';

    public function handle()
    {
        if (Carbon::now()->isWeekend()) {
            $this->info('Weekend detected. Skipping reminders.');
            return;
        }
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new DailyUpdateReminderMail($user));
        }
        $this->info('Daily update reminders sent to all users.');
    }
}
