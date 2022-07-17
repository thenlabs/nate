<?php

use ThenLabs\Nate\Template;

test(function () {
    $page = new Template(__DIR__.'/page.tpl.php');

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
        <p>This is a paragraph.</p>
    </main>

    <footer>
    </footer>

    </body>
    </html>
    HTML;

    $result = $page->render([
        'lang' => 'es',
        'subtitle' => 'Mi Subtítulo',
    ]);

    $this->assertSame(trim($expected), trim($result));
});

test(function () {
    $page = new Template(__DIR__.'/page2.tpl.php');

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
        <p>The body content.</p>

    </body>
    </html>
    HTML;

    $result = $page->render([
        'lang' => 'es',
        'subtitle' => 'Mi Subtítulo',
    ]);

    $this->assertSame(trim($expected), trim($result));
});

test(function () {
    $page = new Template(__DIR__.'/page3.tpl.php');

    $expected = <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>My new title</title>

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

    $result = $page->render([
        'lang' => 'es',
        'subtitle' => 'Mi Subtítulo',
    ]);

    $this->assertSame(trim($expected), trim($result));
});

test(function () {
    $page = new Template(__DIR__.'/page4.tpl.php');

    $expected = <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Title | Subtitle | This is the rest</title>

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

    $result = $page->render([
        'lang' => 'en',
        'subtitle' => 'Subtitle',
    ]);

    $this->assertSame(trim($expected), trim($result));
});

test(function () {
    $page = new Template(__DIR__.'/page5.tpl.php');

    $expected = <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Title | Subtitle</title>

    </head>
    <body>
        <table>
            <tbody>
                                <tr>
    <td>Andy</td>
    <td>M</td>
    </tr>
                                <tr>
    <td>Daniel</td>
    <td>M</td>
    </tr>
                        </tbody>
        </table>

    </body>
    </html>
    HTML;

    $result = $page->render([
        'lang' => 'en',
        'subtitle' => 'Subtitle',
        'persons' => [
            ['name' => 'Andy', 'gender' => 'M'],
            ['name' => 'Daniel', 'gender' => 'M'],
        ],
    ]);

    $this->assertSame(trim($expected), trim($result));
});
