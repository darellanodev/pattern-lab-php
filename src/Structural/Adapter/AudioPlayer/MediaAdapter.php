<?php

namespace App\Structural\Adapter\AudioPlayer;

class MediaAdapter implements MediaPlayer
{
    private AdvancedMediaPlayer $advancedPlayer;

    public function __construct(string $audioType)
    {
        if ($audioType === 'mp4') {
            $this->advancedPlayer = new Mp4Player();
        } elseif ($audioType === 'vlc') {
            $this->advancedPlayer = new VlcPlayer();
        }
    }

    public function play(string $audioType, string $filename): string
    {
        if ($audioType === 'mp4') {
            return $this->advancedPlayer->playMp4($filename);
        } elseif ($audioType === 'vlc') {
            return $this->advancedPlayer->playVlc($filename);
        }
        return '';
    }
}