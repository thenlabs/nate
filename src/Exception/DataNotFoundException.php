<?php
declare(strict_types=1);

namespace ThenLabs\Nate\Exception;

/**
 * @author Andy Daniel Navarro Taño <andaniel05@gmail.com>
 */
class DataNotFoundException extends NateException
{
    public function __construct(string $dataName)
    {
        parent::__construct("Data not found with name '{$dataName}'.");
    }
}
