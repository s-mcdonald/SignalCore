<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\IntegerValueObject;

/**
 * @author s.mcdonald@outlook.com.au
 */
final class AnalysisScore extends IntegerValueObject
{
    public function getValue(): int
    {
        return parent::getValue();
    }

    public function greaterThan(AnalysisScore $score): bool
    {
        return parent::getValue() > $score->getValue();
    }

    public function lessThan(AnalysisScore $score): bool
    {
        return parent::getValue() < $score->getValue();
    }

    protected function checkBoundary(): void
    {
        self::assertBetweenInclusive($this, -15, 15);
    }
}
