<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $asunto="Informacion de contacto";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->contacto=$contacto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contacta.contacta');
    }
}
