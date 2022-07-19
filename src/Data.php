<?php
declare(strict_types=1);

namespace ThenLabs\Nate;

use ArrayAccess;
use IteratorAggregate;
use ThenLabs\Nate\Exception\NonIterableDataException;
use Traversable;

/**
 * @author Andy Daniel Navarro Taño <andaniel05@gmail.com>
 */
class Data implements IteratorAggregate, ArrayAccess
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
        return htmlspecialchars(strval($this->value));
    }

    public function raw()
    {
        return $this->value;
    }

    public function getIterator(): Traversable
    {
        if (! is_iterable($this->value)) {
            throw new NonIterableDataException();
        }

        $generator = function (iterable $iterable) {
            foreach ($iterable as $data) {
                yield new Data($data);
            }

            return;
        };

        return $generator($this->value);
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->value);
    }

    public function offsetGet($offset)
    {
        return $this->value[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->value[$offset] = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->value[$offset]);
    }
}
