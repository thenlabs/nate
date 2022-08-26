# Nate

A Twig-inspired template engine which take adventage of native PHP features.

If you know [Twig](https://twig.symfony.com/), you know Nate.

>If you like this project gift us a ⭐.

## Quick reference.

| Nate | Twig |
| ---- | ---- |
| `<?= $this->data ?>` | `{{ data }}` |
| `<?= $this->data->raw() ?>` | `{{ data\|raw }}` |
| `<?php $this->extends('base.nate.php') ?>` | `{% extends 'base.html.twig' %}` |
| `<?php $this->block('name') ?>` | `{% block name %}` |
| `<?php $this->endblock() ?>` | `{% endblock %}` |
| `<?php if ($condition) : ?>` | `{% if condition %}` |
| `<?php foreach($array as $key => $value) : ?>` | `{% for key, value in array %}` |
| `<?= $this->includeTemplate('another.nate.php', ['data' => 'value']) ?>` | `{{ include('another.html.twig', {data: 'value'}) }}` |

## Installation.

    $ composer require thenlabs/nate dev-main

## Usage example.

`base.nate.php`:

```php
<!DOCTYPE html>
<html lang="<?= $this->lang ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>

    <?php $this->block('styles') ?>
    <?php $this->endblock() ?>
</head>
<body>
    <?php $this->block('body') ?>
    <?php $this->endblock() ?>

    <?php $this->block('scripts') ?>
    <?php $this->endblock() ?>
</body>
</html>
```

`page.nate.php`:

```php
<?php $this->extends('base.nate.php') ?>

<?php $this->block('styles') ?>
    <link rel="stylesheet" href="style.css">
<?php $this->endblock() ?>

<?php $this->block('body') ?>
    <p>This is a paragraph.</p>
<?php $this->endblock() ?>

<?php $this->block('scripts') ?>
    <script src="scripts.js"></script>
<?php $this->endblock() ?>
```

`index.php`:

```php
<?php

use ThenLabs\Nate\Template;

$page = new Template(__DIR__.'/page.nate.php');

echo $page->render([
    'lang' => 'en',
    'title' => 'My Title',
]);
```

### Output:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Title</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>This is a paragraph.</p>

    <script src="scripts.js"></script>
</body>
</html>
```

## Development.

Clone this repository and install the Composer dependencies.

    $ composer install

### Running the tests.

All the tests of this project was written with our testing framework [PyramidalTests][pyramidal-tests] wich is based on [PHPUnit][phpunit].

Run tests:

    $ composer test

[phpunit]: https://phpunit.de
[pyramidal-tests]: https://github.com/thenlabs/pyramidal-tests
