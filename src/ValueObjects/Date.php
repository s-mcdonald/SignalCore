<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use DateTime;
use DateTimeInterface;
use InvalidArgumentException;
use Signal\Core\ValueObjects\Contracts\DateTimeValueObject;

/**
 * Date.
 *
 * Represents a Date. (only)
 *
 * @author s.mcdonald@outlook.com.au
 */
final class Date extends DateTimeValueObject
{
    /**
     * Format must be Y-m-d.
     */
    public static function createFromString(string $date): self
    {
        if (false === preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            throw new InvalidArgumentException('Date must be in format Y-m-d');
        }

        return new self(
            DateTime::createFromFormat('Y-m-d', $date),
        );
    }

    public function getValue(): DateTimeInterface
    {
        return parent::getValue();
    }

    public function lessThan(DateTimeInterface $otherDate): bool
    {
        return $this->getValue()->getTimestamp() < $otherDate->getTimestamp();
    }

    public function greaterThan(DateTimeInterface $otherDate): bool
    {
        return $this->getValue()->getTimestamp() > $otherDate->getTimestamp();
    }

    public function getYear(): int
    {
        return (int) $this->getValue()->format('Y');
    }

    public function getMonth(): int
    {
        return (int) $this->getValue()->format('m');
    }

    public function getMonthString(): string
    {
        return $this->getValue()->format('M');
    }

    public function getDayLongString(): string
    {
        return $this->getValue()->format('l');
    }

    public function isToday(): bool
    {
        return $this->getValue()->format('Y-m-d') === (new DateTime())->format('Y-m-d');
    }

    public function equals(DateTimeInterface $otherDate): bool
    {
        return $this->getValue()->format('Y-m-d') === $otherDate->format('Y-m-d');
    }

    /**
     * Date can not be before 1970 - just a rule we have for now.
     */
    protected function checkBoundary(): void
    {
        if ($this->getValue()->getTimestamp() < 0) {
            throw new InvalidArgumentException('Date can not be before 1970');
        }
    }
}
