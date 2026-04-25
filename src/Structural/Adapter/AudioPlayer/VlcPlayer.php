<?php

namespace App\Structural\Adapter\AudioPlayer;

class VlcPlayer implements AdvancedMediaPlayer
{
    public function playMp4(string $filename): string
    {
        return '';
    }

    public function playVlc(string $filename): string
    {
        return "Playing VLC file: {$filename}";
    }
}