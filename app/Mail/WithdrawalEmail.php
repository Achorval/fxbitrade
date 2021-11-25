<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $record;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($record)
    {
        $this->record = $record;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('admin@fxbitrade.com')->subject($this->record['subject'])->view('emails.withdrawalEmail');

    }
}
