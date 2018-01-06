<?php declare(strict_types = 1);

return [
    ['GET', '/', ['RandomFlix\Controllers\Home', 'show']],
    ['GET', '/{slug}', ['RandomFlix\Controllers\Page', 'show']],
];