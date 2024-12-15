<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\FloatValueObject;

/**
 * Price to Earnings Ratio.
 *
 * PE Ratio (TTM)
 * By dividing the share price, or market value, of a company’s stock by its annual
 * earnings per share, you end up with a figure that represents the amount of
 * money you are paying for each dollar of its earnings.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class PeRatio extends FloatValueObject
{
    private const LOW_VALUE = 20;

    private const HIGH_VALUE = 25;

    /**
     * @param float $sharePrice The current Share price for the asset
     * @param float $earningsPerShare The current EarningsPerShare, if forwardPE then $earningsPerShare
     *                                is the estimated EPS for the next year
     */
    public static function createFromPriceAndEstEps(float $sharePrice, float $earningsPerShare): self
    {
        // @todo: check for div by Zero errors, use VO for input
        return new self($sharePrice / $earningsPerShare);
    }

    public function isNegative(): bool
    {
        return $this->getValue() < 0;
    }

    public function isHigh(): bool
    {
        return $this->getValue() > self::HIGH_VALUE;
    }

    public function isLow(): bool
    {
        return $this->getValue() < self::LOW_VALUE;
    }

    public function isLowerThan(PeRatio $ratio): bool
    {
        return $this->getValue() < $ratio->getValue();
    }

    public function isGreaterThan(PeRatio $ratio): bool
    {
        return $this->getValue() > $ratio->getValue();
    }

    public function raw(): float|int
    {
        return $this->getValue();
    }
}
