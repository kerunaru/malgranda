<?php

declare(strict_types=1);

function journal(string $trace, string $outputFile, string $level = 'debug'): void {
    $handler = fopen($outputFile, 'r+');
    $logFormat = '[%s] <%s> %s' . PHP_EOL;
    fwrite($handler, sprintf($logFormat, date('Y-m-d H:i:s'), $level, $trace));
    fclose($handler);
}
function dd(mixed $element): never {
    var_dump($element);
    die();
}
function basePath(string $file): string {
    return BASE_PATH . '/' . $file;
}

function abort(int $statusCode = 404): never {
    http_response_code($statusCode);

    view($statusCode . '.html.php');

    exit();
}

function view(string $name): void {
    require basePath('/views/' . $name);
}
