<?php

declare(strict_types=1);

namespace Signal\Core\Asset\Contracts;

use Signal\Core\ValueObjects\AssetSymbol;
use Signal\Core\ValueObjects\AssetVo;
use Signal\Core\ValueObjects\Date;
use Signal\Core\ValueObjects\MoneyAmount;
use Signal\Core\ValueObjects\TradingVolume;

/**
 * @author s.mcdonald@outlook.com.au
 * @note: Historical Quotes are not quotes they are data or candles.
 * This interface will eventually undergo a name change.
 */
interface HistoricalQuoteInterface
{
    public function getAsset(): AssetVo;

    public function getDate(): Date;

    public function getSymbol(): AssetSymbol;

    public function getOpen(): MoneyAmount;

    public function getClose(): MoneyAmount;

    public function getHigh(): MoneyAmount;

    public function getLow(): MoneyAmount;

    public function getVolume(): TradingVolume;
}
