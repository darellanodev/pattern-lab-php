<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

use App\Helpers\ExampleLayout;
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

ExampleLayout::render(
    'Audio Player Example',
    'Adapter Pattern Demo',
    'Our app works with <strong>MP3</strong> and <strong>WAV</strong> using <strong>AudioPlayer</strong> and the <strong>MediaPlayer</strong> interface.</p><p class="text-gray-300">Now we need to support <strong>MP4</strong> and <strong>MKV</strong>, but these classes (<strong>Mp4Player</strong> and <strong>MkvPlayer</strong>) come from an external library <strong>that we cannot change</strong>. To use them without changing our app or the library, we create a <strong>MediaAdapter</strong> that connects both.',
    $output
);
