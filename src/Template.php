<?php
declare(strict_types=1);

namespace ThenLabs\Nate;

use ThenLabs\Nate\Exception\TemplateNotFound;

/**
 * @author Andy Daniel Navarro Taño <andaniel05@gmail.com>
 */
class Template
{
    /**
     * @var string
     */
    protected $fileName;

    public function __construct(string $fileName)
    {
        if (! file_exists($fileName)) {
            throw new TemplateNotFound($fileName);
        }

        $this->fileName = $fileName;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function render(array $data = []): ?string
    {
        $compiler = new Compiler($this);
        $compiler->compile($data);

        return $compiler->getResult();
    }
}
