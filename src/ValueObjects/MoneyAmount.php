<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\FloatValueObject;

/**
 * MoneyAmount.
 *
 * Represents a Monetary amount. A monetary amount must be Zero or Above Zero.
 * It can not be negative. For negative monetary values
 * use SignedMoneyAmount.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class MoneyAmount extends FloatValueObject
{
    public function getValue(): float
    {
        return parent::getValue();
    }

    protected function checkBoundary(): void
    {
        self::assertZeroOrAbove($this);
    }
}
