<?php declare(strict_types = 1);

/**
 * File to deal with dependency injection
 */

$injector = new \Auryn\Injector;

//Request
$injector->alias('Symfony\Component\HttpFoundation\Request', 'Symfony\Component\HttpFoundation\Request');
$injector->share('Symfony\Component\HttpFoundation\Request');
$injector->define('Symfony\Component\HttpFoundation\Request', [
    $_GET,
    $_POST,
    array(),
    $_COOKIE,
    $_FILES,
    $_SERVER,
]);

//Response
$injector->alias('Symfony\Component\HttpFoundation\Response', 'Symfony\Component\HttpFoundation\Response');
$injector->share('Symfony\Component\HttpFoundation\Response');
$injector->define('Symfony\Component\HttpFoundation\Response', []);

//Templating
$injector->alias('RandomFlix\Template\Renderer', 'RandomFlix\Template\TwigRenderer');
$injector->delegate('Twig_Environment', function () use ($injector) {
    $loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
    $twig = new Twig_Environment($loader);
    return $twig;
});
$injector->alias('RandomFlix\Template\FrontendRenderer', 'Example\Template\FrontendTwigRenderer');


//Pages controller
$injector->alias('RandomFlix\Page\PageReader', 'Example\Page\FilePageReader');
$injector->share('RandomFlix\Page\FilePageReader');

$injector->define('RandomFlix\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages',
]);

//Menu
$injector->alias('RandomFlix\Menu\MenuReader', 'RandomFlix\Menu\ArrayMenuReader');
$injector->share('RandomFlix\Menu\ArrayMenuReader');

//REST client
$injector->alias('RandomFlix\Services\NetflixRouletteClient', 'RandomFlix\Services\NetflixRouletteClient');
$injector->share('RandomFlix\Services\NetflixRouletteClient');


return $injector;