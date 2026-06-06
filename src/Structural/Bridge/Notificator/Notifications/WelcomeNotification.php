<?php

namespace App\Structural\Bridge\Notificator\Notifications;

use App\Structural\Bridge\Notificator\Notifications\Notification;

class WelcomeNotification extends Notification {
    public function notify(string $text): string {
        return $this->channel->send("[WELCOME] {$text}");
    }
}