<?php

namespace App\Structural\Adapter\AudioPlayer;

class Mp4Player implements AdvancedMediaPlayer
{
    public function playMp4(string $filename): void
    {
        echo "Playing MP4 file: {$filename}" . PHP_EOL;
    }

    public function playVlc(string $filename): void
    {
    }
}