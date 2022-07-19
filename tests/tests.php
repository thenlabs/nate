<?php

use ThenLabs\Nate\Exception\TemplateNotFoundException;
use ThenLabs\Nate\Template;

test(function () {
    $fileName = uniqid('template').'.tpl.php';

    $this->expectException(TemplateNotFoundException::class);
    $this->expectExceptionMessage("Template not found in '{$fileName}'.");

    new Template($fileName);
});

test(function () {
    $template = new Template(__DIR__.'/no-vars.tpl.php');

    $this->assertSame('<html></html>', trim($template->render()));
});

test(function () {
    $template = new Template(__DIR__.'/with-one-var.tpl.php');
    $content = uniqid();
    $data = compact('content');

    $this->assertSame(
        "<div>{$content}</div>",
        trim($template->render($data))
    );
});

test(function () {
    $template = new Template(__DIR__.'/with-one-var.tpl.php');
    $data = ['content' => '<p>hi world</p>'];

    $this->assertSame(
        '<div>&lt;p&gt;hi world&lt;/p&gt;</div>',
        trim($template->render($data))
    );
});

test(function () {
    $template = new Template(__DIR__.'/with-one-raw-var.tpl.php');
    $data = ['content' => '<p>hi world</p>'];

    $this->assertSame(
        '<div><p>hi world</p></div>',
        trim($template->render($data))
    );
});
