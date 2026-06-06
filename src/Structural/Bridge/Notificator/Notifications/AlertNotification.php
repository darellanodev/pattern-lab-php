<?php

namespace App\Structural\Bridge\Notificator\Notifications;

use App\Structural\Bridge\Notificator\Notifications\Notification;

class AlertNotification extends Notification {
    public function notify(string $text): string {
        return $this->channel->send("[ALERT] {$text}");
    }
}