<?php

require_once __DIR__.'/../../../../vendor/autoload.php';

use App\Helpers\ExampleLayout;
use App\Structural\Composite\FileSystem\Directory;
use App\Structural\Composite\FileSystem\File;

$root = new Directory('root');
$docs = new Directory('Documents');
$pics = new Directory('Pictures');

$root->add($docs);
$root->add($pics);
$root->add(new File('config.yaml'));

$docs->add(new File('readme.txt'));
$docs->add(new File('notes.md'));

$pics->add(new File('vacation.jpg'));

$output = [];
$output[] = '=== File System Tree ===';
$output[] = '';
$output[] = $root->display();
$output[] = '';
$output[] = '--- Adding a new file to Documents ---';
$docs->add(new File('todo.txt'));
$output[] = $root->display();

ExampleLayout::render(
    'File System Example',
    'Composite Pattern Demo',
    'Both <strong>File</strong> (leaf) and <strong>Directory</strong> (composite) implement the same <strong>FileSystemComponent</strong> interface. This means a directory can contain files or other directories, and they all respond to <strong>display()</strong> the same way — without the client needing to know which is which.',
    $output
);
