<?php

declare(strict_types=1);

namespace Signal\Core\Asset\Contracts;

use Signal\Core\Enums\AssetType;
use Signal\Core\ValueObjects\AssetLongName;
use Signal\Core\ValueObjects\AssetShortName;
use Signal\Core\ValueObjects\AssetSymbol;
use Signal\Core\ValueObjects\Currency;
use Signal\Core\ValueObjects\Exchange;
use Signal\Core\ValueObjects\MoneyAmount;
use Signal\Core\ValueObjects\OpenInterest;
use Signal\Core\ValueObjects\PeRatio;
use Signal\Core\ValueObjects\TradingVolume;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface QuoteInterface
{
    public function getAssetType(): AssetType;

    public function getSymbol(): AssetSymbol;

    public function getShortName(): AssetShortName|null;

    public function getLongName(): AssetLongName|null;

    public function getCurrency(): Currency|null;

    public function getExchange(): Exchange|null;

    public function getFiftyDayAverage(): MoneyAmount|null;

    public function getFiftyTwoWeekHigh(): MoneyAmount|null;

    public function getFiftyTwoWeekLow(): MoneyAmount|null;

    public function getTrailingPE(): PeRatio|null;

    public function getForwardPE(): PeRatio|null;

    public function getMarketCap(): MoneyAmount|null;

    public function getMarketPrice(): MoneyAmount|null;

    public function getOpenInterest(): OpenInterest|null;

    public function getVolume(): TradingVolume|null;
}
