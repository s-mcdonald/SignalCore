<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\StringValueObject;

/**
 * AssetSymbol.
 *
 * This is the AssetSymbol for an Asset. ex TSLA or AAPL.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class AssetSymbol extends StringValueObject
{
    private const MIN_LENGTH = 1;

    private const MAX_LENGTH = 50;

    protected function checkBoundary(): void
    {
        self::assertMinLength(self::MIN_LENGTH, $this);
        self::assertMaxLength(self::MAX_LENGTH, $this);
    }
}
