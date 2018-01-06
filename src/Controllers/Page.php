<?php declare(strict_types = 1);

namespace RandomFlix\Controllers;

use RandomFlix\Page\InvalidPageException;
use RandomFlix\Template\Renderer;
use Symfony\Component\HttpFoundation\Response;
use RandomFlix\Page\FilePageReader;

class Page
{
    private $response;
    private $renderer;
    private $pageReader;

    public function __construct(Response $response, Renderer $renderer, FilePageReader $pageReader)
    {
        $this->response = $response;
        $this->renderer = $renderer;
        $this->pageReader = $pageReader;
    }

    public function show($params)
    {
        $slug = $params['slug'];

        try {
            $data['content'] = $this->pageReader->readBySlug($slug);
            $html = $this->renderer->render('Page', $data);
            $this->response->setContent($html);
            $this->response->send();
        } catch (InvalidPageException $e) {
            $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
            $this->response->setContent('404 - Page not found');
            $this->response->send();
        }

    }
}