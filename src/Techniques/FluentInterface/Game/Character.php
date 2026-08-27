<?php

namespace App\Techniques\FluentInterface\Game;

class Character
{
    private int $health = 100;
    private int $level = 1;
    private array $inventory = [];

    public function __construct(private string $name)
    {
    }

    public function equip(string $item)
    {
        $this->inventory[] = $item;
        return $this;
    }
    public function heal(int $points)
    {
        $this->health = min(100, $this->health + $points);
        return $this;
    }
    public function levelUp()
    {
        $this->level++;
        return $this;
    }
    public function status()
    {
        return "{$this->name} (Health: {$this->health}, Level: {$this->level}) - Inventory: " .
            implode(',', $this->inventory);
    }
}
