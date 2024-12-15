<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\StringValueObject;

/**
 * CountryName.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class CountryName extends StringValueObject
{
    private const MIN_LENGTH = 1;

    private const MAX_LENGTH = 255;

    protected function checkBoundary(): void
    {
        self::assertMinLength(self::MIN_LENGTH, $this);
        self::assertMaxLength(self::MAX_LENGTH, $this);
    }
}