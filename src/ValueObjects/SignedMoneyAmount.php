<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\NumericValueObject;

/**
 * Like MoneyAmount, however this can also be a negative
 * value.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class SignedMoneyAmount extends NumericValueObject
{
    protected function checkBoundary(): void
    {
    }
}
