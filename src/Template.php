<?php
declare(strict_types=1);

namespace ThenLabs\Nate;

use ThenLabs\Nate\Exception\TemplateNotFoundException;

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
            throw new TemplateNotFoundException($fileName);
        }

        $this->fileName = $fileName;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function render(array $data = []): ?string
    {
        $compiler = new Compiler();
        $compiler->compile($this, $data);

        return $compiler->getResult();
    }
}
