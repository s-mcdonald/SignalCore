<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use DateTimeImmutable;
use Signal\Core\ValueObjects\Contracts\ComplexValueObject;

/**
 * Represents a stock split value object, which encapsulates details about
 * a company's stock-split event.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class StockSplitEvent extends ComplexValueObject
{
    public function __construct(
        private readonly DateTimeImmutable $dateOfSplit,
        private readonly Ratio $ratio,
    ) {
        parent::__construct();
    }

    public function getDateTime(): DateTimeImmutable
    {
        return $this->dateOfSplit;
    }

    public function getRatio(): Ratio
    {
        return $this->ratio;
    }

    protected function checkBoundary(): void
    {
    }
}
