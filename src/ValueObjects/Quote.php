<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\Asset\Contracts\QuoteInterface;
use Signal\Core\Enums\AssetType;
use Signal\Core\ValueObjects\Contracts\ComplexValueObject;

/**
 * Represents a Quote (StockQuote).
 *
 * @author s.mcdonald@outlook.com.au
 */
final class Quote extends ComplexValueObject implements QuoteInterface
{
    public function __construct(
        private readonly AssetType $type,
        private readonly AssetSymbol $symbol,
        private readonly AssetShortName|null $shortName,
        private readonly AssetLongName|null $longName,
        private readonly Currency|null $currency,
        private readonly Exchange|null $exchange,
        private readonly MoneyAmount|null $fiftyDayAverage,
        private readonly MoneyAmount|null $marketPrice,
        private readonly MoneyAmount|null $fiftyTwoWeekHigh,
        private readonly MoneyAmount|null $fiftyTwoWeekLow,
        private readonly PeRatio|null $trailingPe,
        private readonly PeRatio|null $forwardPe,
        private readonly MoneyAmount|null $marketCap,
        private readonly OpenInterest|null $openInterest,
        private readonly TradingVolume|null $volume,
    ) {
        parent::__construct();
    }

    public function getAssetType(): AssetType
    {
        return $this->type;
    }

    public function getSymbol(): AssetSymbol
    {
        return $this->symbol;
    }

    public function getShortName(): AssetShortName|null
    {
        return $this->shortName;
    }

    public function getLongName(): AssetLongName|null
    {
        return $this->longName;
    }

    public function getCurrency(): Currency|null
    {
        return $this->currency;
    }

    public function getExchange(): Exchange|null
    {
        return $this->exchange;
    }

    public function getMarketPrice(): MoneyAmount|null
    {
        return $this->marketPrice;
    }

    public function getFiftyDayAverage(): MoneyAmount|null
    {
        return $this->fiftyDayAverage;
    }

    public function getFiftyTwoWeekHigh(): MoneyAmount|null
    {
        return $this->fiftyTwoWeekHigh;
    }

    public function getFiftyTwoWeekLow(): MoneyAmount|null
    {
        return $this->fiftyTwoWeekLow;
    }

    public function getTrailingPe(): PeRatio|null
    {
        return $this->trailingPe;
    }

    public function getForwardPe(): PeRatio|null
    {
        return $this->forwardPe;
    }

    public function getMarketCap(): MoneyAmount|null
    {
        return $this->marketCap;
    }

    public function getOpenInterest(): OpenInterest|null
    {
        return $this->openInterest;
    }

    public function getVolume(): TradingVolume|null
    {
        return $this->volume;
    }

    protected function checkBoundary(): void
    {
        // implement rules here
    }
}
