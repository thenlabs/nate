<?php
declare(strict_types=1);

namespace ThenLabs\Nate\Exception;

/**
 * @author Andy Daniel Navarro Taño <andaniel05@gmail.com>
 */
class TemplateNotFound extends NateException
{
    public function __construct(string $fileName)
    {
        parent::__construct("Template not found in '{$fileName}'.");
    }
}
