<?php

namespace App\Structural\Adapter\AudioPlayer;

interface AdvancedMediaPlayer
{
    public function playMp4(string $filename): void;
    public function playVlc(string $filename): void;
}