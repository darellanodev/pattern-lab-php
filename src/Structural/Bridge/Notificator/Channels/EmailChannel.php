<?php

namespace App\Structural\Bridge\Notificator\Channels;

use App\Structural\Bridge\Notificator\Channels\NotificationChannel;

class EmailChannel implements NotificationChannel {
    public function send(string $message): string {
        return "Sending by email: {$message}\n";
    }
}