<?php

namespace App\Structural\Adapter\AudioPlayer;

class Mp4Player implements AdvancedMediaPlayer
{
    public function playMp4(string $filename): string
    {
        return "Playing MP4 file: {$filename}";
    }

    public function playVlc(string $filename): string
    {
        return '';
    }
}