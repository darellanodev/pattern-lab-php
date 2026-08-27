<?php

require_once __DIR__ . '/../../../../vendor/autoload.php';

use App\Techniques\FluentInterface\Game\Character;

$output = [];

$hero = new Character('Darian');
$hero->equip('Sword')->heal(20)->levelUp();
$output[] = $hero->status();

?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Example</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="dark:bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-white mb-2">Game Example</h1>
        <p class="text-center text-gray-400 mb-8">Fluent Interface Pattern</p>

        <div class="max-w-2xl mx-auto mb-8">
            <div class="bg-gray-800 rounded-lg p-6">
                <p class="text-gray-300 mb-4">
                We have a <strong>Character</strong> with several actions that can be performed on it: <strong>equip</strong> an item, <strong>heal</strong> health points, and <strong>levelUp</strong>.</p><p class="text-gray-300">Each method returns <strong>$this</strong>, so calls can be chained together in a single, readable statement instead of writing separate lines for every action.
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
