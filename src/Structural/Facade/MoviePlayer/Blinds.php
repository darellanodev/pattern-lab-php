<?php

namespace App\Structural\Facade\MoviePlayer;

class Blinds
{
    public function lower(): string
    {
        return '[Blinds] Lowering the blinds...';
    }

    public function raise(): string
    {
        return '[Blinds] Raising the blinds...';
    }
}
