<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $token;
    protected $email;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $email, $user)
    {
        $this->token = $token;
        $this->email = $email;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Forgot Password')
            ->from('info@visarequest.co.zw')
            ->view('emails.forgot')->with([
                'token' => $this->token,
                'email' => $this->email,
                'user' => $this->user
            ]);
    }
}
