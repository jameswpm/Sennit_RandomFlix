<?php declare(strict_types = 1);

namespace RandomFlix\Template;

use Twig_Environment;

class TwigRenderer implements Renderer
{
    private $engine;

    public function __construct(Twig_Environment $engine)
    {
        $this->engine = $engine;
    }

    public function render($template, $data = []) : string
    {
        return $this->engine->render("$template.html", $data);
    }
}