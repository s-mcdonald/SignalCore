<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\ComplexValueObject;
use Signal\Core\ValueObjects\Exceptions\InvalidValueException;

/**
 * Represents Ratio value such as 3:1  or 20:1.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class Ratio extends ComplexValueObject
{
    public function __construct(
        private int $numerator,
        private int $denominator,
    ) {
        if (0 === $this->denominator) {
            throw new InvalidValueException('Denominator cannot be zero.');
        }

        // Normalize to the simplest form (reduce the ratio)
        $gcd = $this->greatestCommonDivisor($numerator, $denominator);
        $this->numerator = $numerator / $gcd;
        $this->denominator = $denominator / $gcd;

        // Ensure we avoid negative denominators (e.g., 3:-1 => -3:1)
        if ($this->denominator < 0) {
            $this->numerator = -$this->numerator;
            $this->denominator = -$this->denominator;
        }

        parent::__construct();
    }

    /**
     * Returns the Ratio in "numerator:denominator" string format.
     */
    public function __toString(): string
    {
        return "{$this->numerator}:{$this->denominator}";
    }

    /**
     * Returns the numerator of the Ratio.
     */
    public function getNumerator(): int
    {
        return $this->numerator;
    }

    /**
     * Returns the denominator of the Ratio.
     */
    public function getDenominator(): int
    {
        return $this->denominator;
    }

    /**
     * Returns the Ratio as a float (numerator divided by denominator).
     */
    public function toFloat(): float
    {
        return $this->numerator / $this->denominator;
    }

    /**
     * Gets the greatest common divisor (GCD) of two integers.
     */
    private function greatestCommonDivisor(int $a, int $b): int
    {
        while (0 !== $b) {
            [$a, $b] = [$b, $a % $b];
        }

        return abs($a);
    }
}
