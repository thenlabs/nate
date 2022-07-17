<?php
declare(strict_types=1);

namespace ThenLabs\Nate;

/**
 * @author Andy Daniel Navarro Taño <andaniel05@gmail.com>
 */
class Compiler
{
    /**
     * @var Template
     */
    protected $_template;

    /**
     * @var string
     */
    protected $_buffer;

    /**
     * @var array
     */
    protected $_data;

    /**
     * @var array
     */
    protected $_blocks = [];

    /**
     * @var Block
     */
    protected $_currentBlock;

    public function __construct(Template $template)
    {
        $this->_template = $template;
    }

    protected function getTemplateFileName(string $templatePath, bool $isRelative = false): string
    {
        $templateFileName = $this->_template->getFileName();

        $fileName = $isRelative ?
            dirname($templateFileName).'/'.$templatePath :
            $templateFileName
        ;

        return $fileName;
    }

    protected function loadTemplate(string $templatePath, bool $isRelative = false): void
    {
        $fileName = $this->getTemplateFileName($templatePath, $isRelative);

        ob_start();
        include $fileName;

        $buffer = ob_get_clean();

        if (! $this->_buffer) {
            $this->_buffer = $buffer;
        }
    }

    public function extends(string $templatePath): void
    {
        $this->loadTemplate($templatePath, true);
    }

    public function block(string $name): void
    {
        $block = new Block($name);
        $block->setParent($this->_currentBlock);

        $prev = $this->_blocks[$name] ?? null;

        if ($prev instanceof Block) {
            $block->setPrev($prev);
        }

        $this->_blocks[$name] = $block;
        $this->_currentBlock = $block;

        echo "<_block_{$block->getName()}>";
        ob_start();
    }

    public function endBlock(): void
    {
        $this->_currentBlock->setContent(ob_get_clean());
        echo "</_block_{$this->_currentBlock->getName()}>";
        $this->_currentBlock = $this->_currentBlock->getParent();
    }

    public function compile(array $data): void
    {
        $this->_data = $data;

        $this->loadTemplate($this->_template->getFileName());

        foreach ($this->_blocks as $name => $block) {
            $content = $block->getContent();
            $prev = $block->getPrev();

            if ($prev) {
                $content = str_replace('<_parent/>', $prev->getContent(), $content);
            }

            $this->_buffer = preg_replace(
                "/<_block_{$name}>.*<\/_block_{$name}>/",
                $content,
                $this->_buffer
            );
        }
    }

    public function parent(): ?string
    {
        return '<_parent/>';
    }

    public function getResult(): ?string
    {
        return $this->_buffer;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->_data)) {
            $data = new Data($this->_data[$name]);
            return $data;
        }

        return null;
    }

    public function includeTemplate(string $templatePath, array $data = []): ?string
    {
        $fileName = $this->getTemplateFileName($templatePath, true);
        $template = new Template($fileName);

        return $template->render($data);
    }
}