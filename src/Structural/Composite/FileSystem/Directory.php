<?php

namespace App\Structural\Composite\FileSystem;

class Directory implements FileSystemComponent
{
    private $name;
    private $children;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function add(FileSystemComponent $component)
    {
        $this->children[] = $component;
    }

    public function display()
    {
        $result = 'Directory name: '.$this->name;
        foreach ($this->children as $child) {
            $result .= $child->display();
        }

        return $result;
    }
}
