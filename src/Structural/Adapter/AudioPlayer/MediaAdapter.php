<?php

namespace App\Structural\Adapter\AudioPlayer;

class MediaAdapter implements MediaPlayer
{
    private Mp4PlayerInterface|MkvPlayerInterface $advancedPlayer;

    public function __construct(string $audioType)
    {
        if ($audioType === 'mp4') {
            $this->advancedPlayer = new Mp4Player();
        } elseif ($audioType === 'mkv') {
            $this->advancedPlayer = new MkvPlayer();
        }
    }

    public function play(string $audioType, string $filename): string
    {
        if ($audioType === 'mp4' && $this->advancedPlayer instanceof Mp4PlayerInterface) {
            return $this->advancedPlayer->playMp4($filename);
        } elseif ($audioType === 'mkv' && $this->advancedPlayer instanceof MkvPlayerInterface) {
            return $this->advancedPlayer->playMkv($filename);
        }
        return '';
    }
}