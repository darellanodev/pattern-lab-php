<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

use App\Structural\Adapter\AudioPlayer\AudioPlayer;

$audioPlayer = new AudioPlayer();

$output = [];
$output[] = '=== Audio Player Demo ===';
$output[] = '';
$output[] = 'Playing MP3:';
$output[] = $audioPlayer->play('mp3', 'song.mp3');
$output[] = '';
$output[] = 'Playing MP4:';
$output[] = $audioPlayer->play('mp4', 'movie.mp4');
$output[] = '';
$output[] = 'Playing MKV:';
$output[] = $audioPlayer->play('mkv', 'video.mkv');
$output[] = '';
$output[] = 'Playing WAV:';
$output[] = $audioPlayer->play('wav', 'audio.wav');
$output[] = '';
$output[] = 'Unsupported format:';
$output[] = $audioPlayer->play('avi', 'movie.avi');
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Player Example</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="dark:bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-white mb-2">Audio Player Example</h1>
        <p class="text-center text-gray-400 mb-8">Adapter Pattern Demo</p>

        <div class="max-w-2xl mx-auto mb-8">
            <div class="bg-gray-800 rounded-lg p-6">
                <p class="text-gray-300 mb-4">
                Our app works with <strong>MP3</strong> and <strong>WAV</strong> using <strong>AudioPlayer</strong> and the <strong>MediaPlayer</strong> interface.</p><p class="text-gray-300">Now we need to support <strong>MP4</strong> and <strong>MKV</strong>, but these classes (<strong>Mp4Player</strong> and <strong>MkvPlayer</strong>) come from an external library <strong>that we cannot change</strong>. To use them without changing our app or the library, we create a <strong>MediaAdapter</strong> that connects both.
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