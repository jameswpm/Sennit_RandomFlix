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
$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html',
        ]),
    ],
]);
$injector->alias('RandomFlix\Template\Renderer', 'RandomFlix\Template\MustacheRenderer');

return $injector;