<?php

use ThenLabs\Nate\Template;

test(function () {
    $layout = new Template(__DIR__.'/layout.tpl.php');

    $expected = <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Title | Mi Subtítulo</title>

    </head>
    <body>
    <header>
    </header>

    <main>
    </main>

    <footer>
    </footer>

    </body>
    </html>
    HTML;

    $result = $layout->render([
        'lang' => 'es',
        'subtitle' => 'Mi Subtítulo',
    ]);

    $this->assertSame(trim($expected), trim($result));
});
