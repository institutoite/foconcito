<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject="Mensaje revibido";
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Messaje)
    {
        $this->msg=$Messaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('email.correosrecibido');
    }
}
