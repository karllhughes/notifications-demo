<?php

namespace App\Notifications;

use App\Notifications\Messages\CustomMessage;
use Illuminate\Notifications\Notification;

class RegistrationCompleted extends Notification
{
    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new CustomMessage)
            ->subject('Registration Completed!')
            // Optional: Makes this an error notification
            // ->error()
            ->line("Hi {$notifiable->name},")
            ->line("Your registration is now complete. Thanks, and don't forget to come back to our site!")
            ->action($this->data['link']['text'], $this->data['link']['url'])
            ->goodbye("Have a great day!");
    }
}
