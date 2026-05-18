<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositConfirmation extends Mailable
{
    use SerializesModels;

    public $paymentMethod;
    public $walletProof;

    public function __construct($paymentMethod, $walletProof)
    {
        $this->paymentMethod = $paymentMethod;
        $this->walletProof = $walletProof;
    }

    public function build()
    {
        return $this->view('emails.deposit_confirmation')
                    ->with([
                        'paymentMethod' => $this->paymentMethod,
                        'walletProof' => $this->walletProof,
                    ]);
    }
}
