<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\Asset\Contracts\HistoricalQuoteInterface;
use Signal\Core\ValueObjects\Contracts\ComplexValueObject;

/**
 * HistoricalQuote.
 *
 * Represents HistoricalQuote object for an Asset.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class HistoricalQuote extends ComplexValueObject implements HistoricalQuoteInterface
{
    public function __construct(
        private readonly AssetVo $asset,
        private readonly Date $date,
        private readonly MoneyAmount $open,
        private readonly MoneyAmount $close,
        private readonly MoneyAmount $high,
        private readonly MoneyAmount $low,
        private readonly TradingVolume $volume,
    ) {
        parent::__construct();
    }

    public function getDate(): Date
    {
        return $this->date;
    }

    public function getAsset(): AssetVo
    {
        return $this->asset;
    }

    public function getSymbol(): AssetSymbol
    {
        return $this->asset->getSymbol();
    }

    public function getOpen(): MoneyAmount
    {
        return $this->open;
    }

    public function getClose(): MoneyAmount
    {
        return $this->close;
    }

    public function getHigh(): MoneyAmount
    {
        return $this->high;
    }

    public function getLow(): MoneyAmount
    {
        return $this->low;
    }

    public function getVolume(): TradingVolume
    {
        return $this->volume;
    }

    protected function checkBoundary(): void
    {
        // implement rules here
    }
}
