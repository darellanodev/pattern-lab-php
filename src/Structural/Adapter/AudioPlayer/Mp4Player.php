<?php

namespace App\Structural\Adapter\AudioPlayer;

class Mp4Player implements Mp4PlayerInterface
{
    public function playMp4(string $filename): string
    {
        return "Playing MP4 file: {$filename}";
    }
}