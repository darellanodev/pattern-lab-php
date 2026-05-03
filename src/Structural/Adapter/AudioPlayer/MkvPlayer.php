<?php

namespace App\Structural\Adapter\AudioPlayer;

class MkvPlayer implements MkvPlayerInterface
{
    public function playMkv(string $filename): string
    {
        return "Playing MKV file: {$filename}";
    }
}