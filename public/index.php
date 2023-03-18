<?php

declare(strict_types=1);

const BASE_PATH = __DIR__ . '/..';

require BASE_PATH . '/core/helpers.php';

resolveRoute($_SERVER['PATH_INFO'] ?? '/', [
    '/' => [
        'controller' => 'HomeController',
    ],
]);
