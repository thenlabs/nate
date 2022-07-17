<?php
declare(strict_types=1);

namespace ThenLabs\Nate;

/**
 * @author Andy Daniel Navarro Taño <andaniel05@gmail.com>
 */
class Block
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var Block
     */
    protected $parent;

    /**
     * @var Block
     */
    protected $prev;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getParent(): ?Block
    {
        return $this->block;
    }

    public function setParent(?Block $block): void
    {
        $this->block = $block;
    }

    public function getPrev(): ?Block
    {
        return $this->prev;
    }

    public function setPrev(?Block $prev): void
    {
        $this->prev = $prev;
    }
}
