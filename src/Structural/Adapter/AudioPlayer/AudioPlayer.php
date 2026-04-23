<?php

namespace Src\Structural\Adapter\AudioPlayer;

class AudioPlayer implements MediaPlayer
{
    private MediaAdapter $adapter;

    public function play(string $audioType, string $filename): void
    {
        if (in_array($audioType, ['mp3', 'wav'])) {
            echo "Playing MP3/WAV file: {$filename}" . PHP_EOL;
        } elseif (in_array($audioType, ['mp4', 'vlc'])) {
            $this->adapter = new MediaAdapter($audioType);
            $this->adapter->play($audioType, $filename);
        } else {
            echo "Unsupported audio type: {$audioType}" . PHP_EOL;
        }
    }
}