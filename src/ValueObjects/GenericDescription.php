<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\StringValueObject;

/**
 * GenericDescription.
 *
 * This is the Description various items.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class GenericDescription extends StringValueObject
{
    private const MIN_LENGTH = 0;

    private const MAX_LENGTH = 255;

    public function getValue(): string
    {
        return parent::getValue();
    }

    protected function checkBoundary(): void
    {
        self::assertMinLength(self::MIN_LENGTH, $this);
        self::assertMaxLength(self::MAX_LENGTH, $this);
    }
}
