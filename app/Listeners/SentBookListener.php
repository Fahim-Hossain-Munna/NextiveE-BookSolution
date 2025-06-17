<?php

namespace App\Listeners;

use App\Mail\TransactionCompleteMail;
use App\Models\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SentBookListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Mail::to($event->transaction->user->email)->send(new TransactionCompleteMail($event->transaction));
    }
}
