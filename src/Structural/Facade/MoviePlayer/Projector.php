<?php

namespace App\Structural\Facade\MoviePlayer;

class Projector
{
    public function turnOn(): string
    {
        return '[Projector] Turning on and switching to cinema mode...';
    }

    public function turnOff(): string
    {
        return '[Projector] Turning off...';
    }
}
