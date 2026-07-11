<?php

namespace App\Structural\Facade\MoviePlayer;

class Lights
{
    public function turnOn(): string
    {
        return '[Lights] Lights turned on.';
    }

    public function turnOff(): string
    {
        return '[Lights] Lights turned off.';
    }
}
