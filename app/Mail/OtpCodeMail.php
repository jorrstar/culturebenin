<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;
    public $purpose;

    public function __construct(string $code, string $purpose = 'verification')
    {
        $this->code = $code;
        $this->purpose = $purpose;
    }

    public function build()
    {
        return $this->subject("Votre code de vérification")
                    ->view('emails.otp')
                    ->with([
                        'code' => $this->code,
                        'purpose' => $this->purpose,
                    ]);
    }
}
