<?php declare(strict_types = 1);

namespace RandomFlix\Template;

interface Renderer
{
    public function render($template, $data = []) : string;
}