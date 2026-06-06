<?php

namespace App\Structural\Bridge\Notificator\Notifications;

use App\Structural\Bridge\Notificator\Channels\NotificationChannel;

abstract class Notification {
    protected NotificationChannel $channel;

    public function __construct(NotificationChannel $channel) {
        $this->channel = $channel;
    }

    abstract public function notify(string $text): string;
}