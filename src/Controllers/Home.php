<?php declare(strict_types = 1);

namespace RandomFlix\Controllers;

use RandomFlix\Menu\MenuReader;
use RandomFlix\Template\FrontendTwigRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class Home
 * Define the controller for HomePage
 * @package RandomFlix\Controllers
 */
class Home
{
    private $request;
    private $response;
    private $renderer;
    private $menuReader;

    public function __construct(Request $request, Response $response, FrontendTwigRenderer $renderer, MenuReader $menuReader)
    {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
        $this->menuReader = $menuReader;
    }

    public function show()
    {
        $data = [
            'name' => $this->request->query->get('name', 'stranger'),
            'menuItems' => $this->menuReader->readMenu(),
        ];
        $html = $this->renderer->render('Homepage', $data);
        $this->response->setContent($html);
        $this->response->send();
    }
}