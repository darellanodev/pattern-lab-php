<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

use App\Helpers\ExampleLayout;
use App\Structural\Bridge\Notificator\Channels\EmailChannel;
use App\Structural\Bridge\Notificator\Channels\PushChannel;
use App\Structural\Bridge\Notificator\Channels\SmsChannel;
use App\Structural\Bridge\Notificator\Notifications\AlertNotification;
use App\Structural\Bridge\Notificator\Notifications\ReminderNotification;
use App\Structural\Bridge\Notificator\Notifications\WelcomeNotification;

$output = [];

$alertByEmail = new AlertNotification(new EmailChannel());
$output[] = $alertByEmail->notify("Server is down");

$reminderBySms = new ReminderNotification(new SmsChannel());
$output[] = $reminderBySms->notify("Meeting at 5 PM");

$welcomeByPush = new WelcomeNotification(new PushChannel());
$output[] = $welcomeByPush->notify("New user registered");

ExampleLayout::render(
    'Notificator Example',
    'Bridge Pattern Demo',
    'We have different types of messages: <strong>Alert</strong>, <strong>Reminder</strong>, and <strong>Welcome</strong>. We also have different ways to send them: by <strong>Email</strong>, <strong>SMS</strong>, or <strong>Push</strong>.</p><p class="text-gray-300">Without the Bridge pattern we would need a separate class for each combination (AlertByEmail, AlertBySms, etc.). Instead, we separate the message type from the delivery channel, so we can mix and match them freely.',
    $output
);
