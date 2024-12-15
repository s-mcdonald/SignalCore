<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects\Contracts\Traits;

use InvalidArgumentException;
use Signal\Core\ValueObjects\Contracts\NumericValueObject;

/**
 * @author s.mcdonald@outlook.com.au
 */
trait ComparesNumericAgainstZeroTrait
{
    protected static function assertZeroOrAbove(NumericValueObject $vo): void
    {
        if ($vo->getValue() < 0) {
            throw new InvalidArgumentException(static::class . ' value must be zero or above.');
        }
    }

    protected static function assertZeroOrBelow(NumericValueObject $vo): void
    {
        if ($vo->getValue() > 0) {
            throw new InvalidArgumentException(static::class . ' value must be zero or above.');
        }
    }

    protected static function assertAboveZero(NumericValueObject $vo): void
    {
        if ($vo->getValue() <= 0) {
            throw new InvalidArgumentException(static::class . ' value must be above zero.');
        }
    }

    protected static function assertBelowZero(NumericValueObject $vo): void
    {
        if ($vo->getValue() >= 0) {
            throw new InvalidArgumentException(static::class . ' value must be below zero.');
        }
    }
}
