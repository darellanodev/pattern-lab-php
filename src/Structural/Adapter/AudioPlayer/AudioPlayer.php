<?php

namespace App\Structural\Adapter\AudioPlayer;

class AudioPlayer implements MediaPlayer
{
    private MediaAdapter $adapter;

    public function play(string $audioType, string $filename): string
    {
        if (in_array($audioType, ['mp3', 'wav'])) {
            return "Playing MP3/WAV file: {$filename}";
        } elseif (in_array($audioType, ['mp4', 'vlc'])) {
            $this->adapter = new MediaAdapter($audioType);
            return $this->adapter->play($audioType, $filename);
        } else {
            return "Unsupported audio type: {$audioType}";
        }
    }
}