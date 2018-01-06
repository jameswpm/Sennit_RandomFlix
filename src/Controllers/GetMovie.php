<?php declare(strict_types = 1);

namespace RandomFlix\Controllers;

use RandomFlix\Menu\MenuReader;
use RandomFlix\Services\NetflixRouletteClient;
use RandomFlix\Template\FrontendTwigRenderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class GetMovie
 * Define the controller for GetMovie Page
 * @package RandomFlix\Controllers
 */
class GetMovie
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
        $client = new NetflixRouletteClient();

        $data = [
            'response' => $client->get_random_movie(),
            'menuItems' => [['href' => '/', 'text' => 'Homepage']],
        ];
        $html = $this->renderer->render('GetMovie', $data);
        $this->response->setContent($html);
        $this->response->send();
    }
}