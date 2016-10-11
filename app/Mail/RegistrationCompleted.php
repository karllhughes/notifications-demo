<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class RegistrationCompleted extends Mailable
{
    public $data;

    /**
     * Instantiate the Mailable with some data
     *
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Build the message with a given template.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['from']['email'])
            ->to($this->data['to']['email'])
            ->view('emails.registration-completed');
    }
}
