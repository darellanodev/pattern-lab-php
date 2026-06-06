<?php

namespace App\Structural\Bridge\Notificator\Channels;

interface NotificationChannel {
    public function send(string $message): string;
}