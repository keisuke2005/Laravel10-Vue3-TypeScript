<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $token;

    public function __construct($name, $token)
    {
        $this->name = $name;
        $this->token = $token;
    }

    public function build()
    {
        return $this->view('emails.verify')
        ->with([
            'name' => $this->name,
            'token' => $this->token,
        ]);
    }
}

