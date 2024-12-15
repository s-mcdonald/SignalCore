<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\IntegerValueObject;

/**
 * Class TradingVolume.
 *
 * Represents a value object for trading volume, ensuring that the volume value
 * is a non-negative integer. The class extends the IntegerValueObject
 * contract to provide integer-based value object functionality.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class TradingVolume extends IntegerValueObject
{
    public function getValue(): int
    {
        return parent::getValue();
    }

    public function greaterThan(TradingVolume $volume): bool
    {
        return parent::getValue() > $volume->getValue();
    }

    public function lessThan(TradingVolume $volume): bool
    {
        return parent::getValue() < $volume->getValue();
    }

    protected function checkBoundary(): void
    {
        self::assertZeroOrAbove($this);
    }
}
