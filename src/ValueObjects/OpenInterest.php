<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\NumericValueObject;

/**
 * OpenInterest.
 *
 * Open interest reflects the number of contracts held by traders
 * in active positions, ready to be traded. Volume reflects a
 * running total throughout the trading day, and open
 * interest is updated once per day.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class OpenInterest extends NumericValueObject
{
    public function getValue(): float|int
    {
        return parent::getValue();
    }

    protected function checkBoundary(): void
    {
        self::assertAboveZero($this);
    }
}
