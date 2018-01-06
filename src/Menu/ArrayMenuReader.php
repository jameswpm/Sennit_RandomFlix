<?php declare(strict_types = 1);

namespace RandomFlix\Menu;

class ArrayMenuReader implements MenuReader
{
    public function readMenu() : array
    {
        return [
            ['href' => '/', 'text' => 'Homepage'],
            ['href' => '/page-one', 'text' => 'Get a Movie!'],
        ];
    }
}