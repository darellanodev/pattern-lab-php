<?php

require_once __DIR__ . '/../../../../vendor/autoload.php';

use App\Structural\Adapter\AudioPlayer\AudioPlayer;

$audioPlayer = new AudioPlayer();

echo "=== Audio Player Demo ===" . PHP_EOL . PHP_EOL;

echo "Playing MP3:" . PHP_EOL;
$audioPlayer->play('mp3', 'song.mp3');

echo PHP_EOL . "Playing MP4:" . PHP_EOL;
$audioPlayer->play('mp4', 'movie.mp4');

echo PHP_EOL . "Playing VLC:" . PHP_EOL;
$audioPlayer->play('vlc', 'video.vlc');

echo PHP_EOL . "Playing WAV:" . PHP_EOL;
$audioPlayer->play('wav', 'audio.wav');

echo PHP_EOL . "Unsupported format:" . PHP_EOL;
$audioPlayer->play('avi', 'movie.avi');