<?php

declare(strict_types=1);

renderView('home/index.html.php', [
    'subject' => $_REQUEST['name'] ?? 'world'
]);
