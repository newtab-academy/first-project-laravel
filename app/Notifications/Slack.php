<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class Slack extends Notification {
    use Queueable;

    private $message;

    public function __construct($message) {
        $this->message = $message;
    }

    public function via($notifiable) {
        return ['slack'];
    }

    public function toSlack($notifiable) {

        return (new SlackMessage)
                ->from('Newtab', ':sunglasses:')
                ->to('#newtab-notification')
                ->content($this->message);
    }
}
