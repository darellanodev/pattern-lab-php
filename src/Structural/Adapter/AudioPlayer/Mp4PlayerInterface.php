<?php

namespace App\Structural\Adapter\AudioPlayer;

interface Mp4PlayerInterface
{
    public function playMp4(string $filename): string;
}