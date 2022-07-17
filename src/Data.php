<?php
declare(strict_types=1);

namespace ThenLabs\Nate;

/**
 * @author Andy Daniel Navarro Taño <andaniel05@gmail.com>
 */
class Data
{
    /**
     * @var mixed
     */
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return htmlspecialchars($this->value);
    }

    public function raw()
    {
        return $this->value;
    }
}
