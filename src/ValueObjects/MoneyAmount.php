<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\NumericValueObject;

/**
 * MoneyAmount.
 *
 * Represents a Monetary amount. A monetary amount must be Zero or Above Zero.
 * It can not be negative. For negative monetary values
 * use SignedMoneyAmount.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class MoneyAmount extends NumericValueObject
{
    public function getValue(): float
    {
        return (float) parent::getValue();
    }

    public function greaterThan(MoneyAmount $other): bool
    {
        return $this->getValue() > $other->getValue();
    }

    public function lessThan(MoneyAmount $other): bool
    {
        return $this->getValue() < $other->getValue();
    }

    public function equalTo(MoneyAmount $other): bool
    {
        return $this->getValue() === $other->getValue();
    }

    protected function checkBoundary(): void
    {
        self::assertZeroOrAbove($this);
    }
}
