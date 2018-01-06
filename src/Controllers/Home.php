<?php declare(strict_types = 1);

namespace RandomFlix\Controllers;

use RandomFlix\Template\Renderer;
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

    public function __construct(Request $request, Response $response, Renderer $renderer)
    {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }

    public function show()
    {
        $data = [
            'name' => $this->request->query->get('name', 'stranger')
        ];
        $html = $this->renderer->render('Homepage', $data);
        $this->response->setContent($html);
        $this->response->send();
    }
}