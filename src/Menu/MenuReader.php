<?php declare(strict_types = 1);

namespace RandomFlix\Menu;

interface MenuReader
{
    public function readMenu() : array;
}