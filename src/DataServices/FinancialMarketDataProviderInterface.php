<?php

declare(strict_types=1);

namespace Signal\Core\DataServices;

use DateTimeInterface;
use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Asset\Contracts\KeyStatsInterface;
use Signal\Core\Asset\Contracts\QuoteInterface;
use Signal\Core\Collections\HistoricalQuoteCollection;
use Signal\Core\Enums\AssetType;
use Signal\Core\Enums\Interval;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface FinancialMarketDataProviderInterface
{
    public function getAsset(string $symbol, AssetType $type = AssetType::Equities): AssetInterface|null;

    public function getQuote(AssetInterface $asset): QuoteInterface|null;

    public function getHistoricalData(
        AssetInterface $asset,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate,
        Interval $interval = Interval::Daily,
    ): HistoricalQuoteCollection|null;

    public function getKeyStats(AssetInterface $asset): KeyStatsInterface|null;

    public function getHistoricalDataForPastDays(
        AssetInterface $asset,
        int $days = 14,
        Interval $interval = Interval::Daily,
    ): HistoricalQuoteCollection|null;
}
