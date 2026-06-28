<?php

namespace App\Structural\Composite\FileSystem;

class File implements FileSystemComponent
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function display()
    {
        return 'File name:'.$this->name;
    }
}
