<?php namespace App\Notifications\Messages;

use Illuminate\Notifications\Messages\MailMessage;

class CustomMessage extends MailMessage
{
    public $goodbye;

    /**
     * Add a Custom Line to the notification
     *
     * @param $greeting string
     *
     * @return $this
     */
    public function goodbye($goodbye = null)
    {
        $this->goodbye = $goodbye ?: 'Goodbye!';
        return $this;
    }

    /**
     * Get an array representation of the message.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'level' => $this->level,
            'subject' => $this->subject,
            'greeting' => $this->greeting,
            'goodbye' => $this->goodbye,
            'introLines' => $this->introLines,
            'outroLines' => $this->outroLines,
            'actionText' => $this->actionText,
            'actionUrl' => $this->actionUrl,
        ];
    }
}
