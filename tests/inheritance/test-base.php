<?php

use ThenLabs\Nate\Template;

test(function () {
    $layout = new Template(__DIR__.'/base.tpl.php');

    $expected = <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Title | My Subtitle</title>

    </head>
    <body>

    </body>
    </html>
    HTML;

    $result = $layout->render([
        'lang' => 'en',
        'subtitle' => 'My Subtitle',
    ]);

    $this->assertEquals(trim($expected), trim($result));
});
