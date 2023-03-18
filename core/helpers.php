<?php

declare(strict_types=1);

function journal(string $trace, string $outputFile, string $level = 'debug'): void {
    $handler = fopen($outputFile, 'rb+');
    $logFormat = '[%s] <%s> %s' . PHP_EOL;
    fwrite($handler, sprintf($logFormat, date('Y-m-d H:i:s'), $level, $trace));
    fclose($handler);
}

function dd(mixed $element): never {
    echo '<pre>';
    var_dump($element);
    echo '</pre>';
    die();
}

function basePath(string $file): string {
    return BASE_PATH . '/' . $file;
}

function abort(int $statusCode = 404): never {
    http_response_code($statusCode);

    renderView($statusCode . '.html.php');

    exit();
}

function renderView(string $name, array $variables = []): void {
    extract($variables, EXTR_OVERWRITE);
    require basePath('/views/' . $name);
}

function resolveRoute(string $uri, array $definedRoutes): void {
    if (! array_key_exists($uri, $definedRoutes)) {
        abort();
    }

    require basePath('controller/' . $definedRoutes[$uri]['controller'] . '.php');
}
