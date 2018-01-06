<?php declare(strict_types = 1);

namespace RandomFlix\Page;

interface PageReader
{
    public function readBySlug(string $slug) : string;
}