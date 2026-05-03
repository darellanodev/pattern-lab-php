<?php

namespace App\Structural\Adapter\AudioPlayer;

interface MkvPlayerInterface
{
    public function playMkv(string $filename): string;
}