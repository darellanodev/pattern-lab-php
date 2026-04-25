<?php

namespace App\Structural\Adapter\AudioPlayer;

interface MediaPlayer
{
    public function play(string $audioType, string $filename): void;
}