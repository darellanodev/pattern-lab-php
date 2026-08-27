<?php

namespace App\Helpers;

class ExampleLayout
{
    public static function buildHtml(
        string $title,
        string $subtitle,
        string $description,
        array $output
    ): string {
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $subtitle = htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8');
        $outputText = implode("\n", $output);

        return <<<HTML
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="dark:bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-white mb-2">{$title}</h1>
        <p class="text-center text-gray-400 mb-8">{$subtitle}</p>

        <div class="max-w-2xl mx-auto mb-8">
            <div class="bg-gray-800 rounded-lg p-6">
                <p class="text-gray-300 mb-4">
                {$description}
                </p>
            </div>
        </div>

        <div class="max-w-2xl mx-auto">
            <pre class="bg-gray-800 text-green-400 p-6 rounded-lg shadow-md overflow-x-auto font-mono text-sm">{$outputText}</pre>

            <div class="mt-8 text-center">
                <a href="../../../../index.php" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded transition">
                    Back to Patterns
                </a>
            </div>
        </div>
    </div>
</body>
</html>
HTML;
    }

    public static function render(
        string $title,
        string $subtitle,
        string $description,
        array $output
    ): void {
        echo self::buildHtml($title, $subtitle, $description, $output);
    }
}
