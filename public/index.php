<?php

declare(strict_types=1);

const BASE_PATH = __DIR__ . '/..';

require BASE_PATH . '/core/helpers.php';

journal('Hola', 'php://stderr'); // REVIEW: stdout is not working
view('home/index.html.php');
