<?php

namespace App\Helpers;

class PatternCard
{
    public static function buildHtml(
        string $title,
        string $description,
        string $useCase,
        string $url,
        string $extraClasses = ''
    ): string {
        $classes = 'bg-gray-800 rounded-lg shadow-md overflow-hidden';
        if ($extraClasses) {
            $classes .= ' ' . $extraClasses;
        }

        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        $useCase = htmlspecialchars($useCase, ENT_QUOTES, 'UTF-8');
        $url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');

        return <<<HTML
            <div class="{$classes}">
                <div class="p-6">
                    <h3 class="text-xl font-medium text-white mb-2">{$title}</h3>
                    <p class="text-gray-400 mb-2">{$description}</p>
                    <p class="text-gray-500 text-sm mb-4">Use case: {$useCase}</p>
                    <a href="{$url}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded transition">
                        View Example
                    </a>
                </div>
            </div>
        HTML;
    }

    public static function render(
        string $title,
        string $description,
        string $useCase,
        string $url,
        string $extraClasses = ''
    ): void {
        echo self::buildHtml($title, $description, $useCase, $url, $extraClasses);
    }
}
