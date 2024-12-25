<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\IntegerValueObject;

/**
 * @author s.mcdonald@outlook.com.au
 */
class PositiveInteger extends IntegerValueObject
{
    public function getValue(): int
    {
        return parent::getValue();
    }

    protected function checkBoundary(): void
    {
        self::assertZeroOrAbove($this);
    }
}
