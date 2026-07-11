<?php

namespace App\Structural\Facade\MoviePlayer;

class StreamingPlayer
{
    public function play(string $title): string
    {
        return "[Streaming] Playing \"{$title}\"...";
    }

    public function enableSubtitles(string $language): string
    {
        return "[Streaming] Subtitles enabled in {$language}.";
    }

    public function stop(): string
    {
        return '[Streaming] Playback stopped.';
    }
}
