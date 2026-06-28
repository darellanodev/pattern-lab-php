<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

use App\Structural\Composite\FileSystem\Directory;
use App\Structural\Composite\FileSystem\File;

$root = new Directory('root');
$docs = new Directory('Documents');
$pics = new Directory('Pictures');

$root->add($docs);
$root->add($pics);
$root->add(new File('config.yaml'));

$docs->add(new File('readme.txt'));
$docs->add(new File('notes.md'));

$pics->add(new File('vacation.jpg'));

$output = [];
$output[] = '=== File System Tree ===';
$output[] = '';
$output[] = $root->display();
$output[] = '';
$output[] = '--- Adding a new file to Documents ---';
$docs->add(new File('todo.txt'));
$output[] = $root->display();
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File System Example</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="dark:bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-white mb-2">File System Example</h1>
        <p class="text-center text-gray-400 mb-8">Composite Pattern Demo</p>

        <div class="max-w-2xl mx-auto mb-8">
            <div class="bg-gray-800 rounded-lg p-6">
                <p class="text-gray-300 mb-4">
                Both <strong>File</strong> (leaf) and <strong>Directory</strong> (composite) implement the same <strong>FileSystemComponent</strong> interface. This means a directory can contain files or other directories, and they all respond to <strong>display()</strong> the same way — without the client needing to know which is which.
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
