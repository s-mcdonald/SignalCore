<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects\Exceptions;

use InvalidArgumentException;

class InvalidValueException extends InvalidArgumentException
{
    public static function forMoney(float $value, string $message): self
    {
        return new self("Invalid value: $value, : " . $message);
    }
}
