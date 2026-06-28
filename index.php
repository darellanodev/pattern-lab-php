<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Helpers\PatternCard;

?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pattern Lab PHP - Design Patterns Examples</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark:bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center text-white mb-4">Pattern Lab PHP</h1>
        <p class="text-center text-gray-400 mb-12">Design Patterns Examples in PHP</p>

        <div class="max-w-2xl mx-auto">
            <h2 class="text-2xl font-semibold text-gray-200 mb-6">Structural Patterns</h2>

            <?php PatternCard::render(
                'Adapter',
                'Lets things work even if they are different. Like a plug adapter when you travel: your charger works the same, only the shape changes.',
                'integrating old APIs, legacy systems, or third-party libraries.',
                'examples/structural/adapter/audio_player/index.php'
            ); ?>

            <?php PatternCard::render(
                'Decorator',
                'Adds extra features to objects while keeping the original code unchanged. Like putting toppings on a pizza: you still have a pizza, but with more things on it.',
                'adding features to classes without changing their structure, extending functionality.',
                'examples/structural/decorator/pizza/index.php',
                'mt-4'
            ); ?>

            <?php PatternCard::render(
                'Composite',
                'Lets you treat individual objects and groups of objects the same way. A folder with files is still a "thing you can open" — just like a single file.',
                'tree structures, file systems, menus, or any hierarchy where leaves and containers must be treated uniformly.',
                'examples/structural/composite/filesystem/index.php',
                'mt-4'
            ); ?>

            <?php PatternCard::render(
                'Bridge',
                'Separates the type of message from the way it is sent. You can send an alert by email, a reminder by SMS, or a welcome by push — the message type and the delivery channel can change independently.',
                'when you have different types of notifications and different delivery channels, and you want to combine them freely.',
                'examples/structural/bridge/notificator/index.php',
                'mt-4'
            ); ?>
        </div>
    </div>
</body>

</html>