<?php
declare(strict_types=1);

namespace ThenLabs\Nate;

/**
 * @author Andy Daniel Navarro Taño <andaniel05@gmail.com>
 */
class Config
{
    public function getDataClass(): string
    {
        return Data::class;
    }
}
