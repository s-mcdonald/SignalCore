<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\StringValueObject;

/**
 * AssetShortName.
 *
 * Represents a ShortName object for an Asset.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class AssetShortName extends StringValueObject
{
    // we may not have a short name yet
    private const MIN_LENGTH = 0;

    private const MAX_LENGTH = 255;

    protected function checkBoundary(): void
    {
        self::assertMinLength(self::MIN_LENGTH, $this);
        self::assertMaxLength(self::MAX_LENGTH, $this);
    }
}
