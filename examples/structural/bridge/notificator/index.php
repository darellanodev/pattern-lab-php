<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

use App\Structural\Bridge\Notificator\Notifications\AlertNotification;
use App\Structural\Bridge\Notificator\Notifications\ReminderNotification;
use App\Structural\Bridge\Notificator\Notifications\WelcomeNotification;
use App\Structural\Bridge\Notificator\Channels\EmailChannel;
use App\Structural\Bridge\Notificator\Channels\SmsChannel;
use App\Structural\Bridge\Notificator\Channels\PushChannel;

$output = [];

$alertByEmail = new AlertNotification(new EmailChannel());
$output[] = $alertByEmail->notify("Server is down");

$reminderBySms = new ReminderNotification(new SmsChannel());
$output[] = $reminderBySms->notify("Meeting at 5 PM");

$welcomeByPush = new WelcomeNotification(new PushChannel());
$output[] = $welcomeByPush->notify("New user registered");

?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificator Example</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark:bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-white mb-2">Notificator Example</h1>
        <p class="text-center text-gray-400 mb-8">Bridge Pattern Demo</p>

        <div class="max-w-2xl mx-auto mb-8">
            <div class="bg-gray-800 rounded-lg p-6">
                <p class="text-gray-300 mb-4">
                We have different types of messages: <strong>Alert</strong>, <strong>Reminder</strong>, and <strong>Welcome</strong>. We also have different ways to send them: by <strong>Email</strong>, <strong>SMS</strong>, or <strong>Push</strong>.</p><p class="text-gray-300">Without the Bridge pattern we would need a separate class for each combination (AlertByEmail, AlertBySms, etc.). Instead, we separate the message type from the delivery channel, so we can mix and match them freely.
                </p>
            </div>
        </div>

        <div class="max-w-2xl mx-auto">
            <pre class="bg-gray-800 text-green-400 p-6 rounded-lg shadow-md overflow-x-auto font-mono text-sm"><?php echo implode("\n", $output); ?></pre>

            <div class="mt-8 text-center">
                <a href="../../../../index.php" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded transition">
                    Back to Patterns
                </a>
            </div>
        </div>
    </div>
</body>

</html>