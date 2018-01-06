<?php declare(strict_types = 1);

return [
    ['GET', '/', ['RandomFlix\Controllers\Home', 'show']],
    ['GET', '/get-movie', ['RandomFlix\Controllers\GetMovie', 'show']],
    ['GET', '/{slug}', ['RandomFlix\Controllers\Page', 'show']],
];