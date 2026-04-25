<?php

namespace App\Structural\Adapter\AudioPlayer;

class VlcPlayer implements AdvancedMediaPlayer
{
    public function playMp4(string $filename): void
    {
    }

    public function playVlc(string $filename): void
    {
        echo "Playing VLC file: {$filename}" . PHP_EOL;
    }
}