<?php

namespace App\Structural\Adapter\AudioPlayer;

interface AdvancedMediaPlayer
{
    public function playMp4(string $filename): string;
    public function playVlc(string $filename): string;
}