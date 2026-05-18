<?php

namespace App\Mail;

use App\Models\WithdrawRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $withdrawal;

    // Pass the withdrawal request to the Mailable
    public function __construct(WithdrawRequest $withdrawal)
    {
        $this->withdrawal = $withdrawal;
    }

    public function build()
    {
        return $this->subject('Your Withdrawal Has Been Approved')
                    ->view('emails.withdrawal_approved'); // The view file you referenced
    }
}

