<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentProofUploaded extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $plan;
    public $paymentMethod;

    public function __construct($user, $plan, $paymentMethod)
    {
        $this->user = $user;
        $this->plan = $plan;
        $this->paymentMethod = ucfirst($paymentMethod);
    }

    public function build()
    {
        return $this->subject('✅ Payment Proof Received')
                    ->view('emails.payment_proof_uploaded');
    }
}
