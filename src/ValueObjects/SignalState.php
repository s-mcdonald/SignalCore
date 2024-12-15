<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Enums\IndicatorType;
use Signal\Core\Enums\Interval;
use Signal\Core\Enums\Signal;
use Signal\Core\ValueObjects\Contracts\ComplexValueObject;

/**
 * This is a VO to determine for a particular moment, for a
 * Signal and stock, is the stock a buy. This wraps the
 * Signal and Stock and a Date with Uuid to
 * give it a unique identification.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class SignalState extends ComplexValueObject
{
    public function __construct(
        private readonly AssetInterface $stock,
        private readonly Signal $signal,
        private readonly string $description,
        private readonly IndicatorType $indicatorType,
        private readonly Interval $interval,
        private readonly string $raw = '',
    ) {
        parent::__construct();
    }

    public function getStock(): AssetInterface
    {
        return $this->stock;
    }

    public function getSignal(): Signal
    {
        return $this->signal;
    }

    public function getIndicatorType(): IndicatorType
    {
        return $this->indicatorType;
    }

    public function getRaw(): string
    {
        return $this->raw;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getInterval(): Interval
    {
        return $this->interval;
    }

    protected function checkBoundary(): void
    {
        // implement rules here
    }
}
