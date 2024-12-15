<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\StringValueObject;

/**
 * AnalyzerShortName.
 *
 * This is the Name for an Analyzer.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class AnalyzerShortName extends StringValueObject
{
    private const MIN_LENGTH = 2;

    private const MAX_LENGTH = 50;

    protected function checkBoundary(): void
    {
        self::assertMinLength(self::MIN_LENGTH, $this);
        self::assertMaxLength(self::MAX_LENGTH, $this);
    }
}
