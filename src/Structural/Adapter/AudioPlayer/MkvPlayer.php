<?php

namespace App\Structural\Adapter\AudioPlayer;

class MkvPlayer implements AdvancedMediaPlayer
{
    public function playMp4(string $filename): string
    {
        return '';
    }

    public function playMkv(string $filename): string
    {
        return "Playing MKV file: {$filename}";
    }
}