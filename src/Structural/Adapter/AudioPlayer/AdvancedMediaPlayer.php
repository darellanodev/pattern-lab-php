<?php

namespace App\Structural\Adapter\AudioPlayer;

interface AdvancedMediaPlayer
{
    public function playMp4(string $filename): string;
    public function playMkv(string $filename): string;
}