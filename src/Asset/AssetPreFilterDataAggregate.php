<?php

declare(strict_types=1);

namespace Signal\Core\Asset;

use Signal\Core\Asset\Contracts\KeyStatsInterface;
use Signal\Core\Collections\HistoricalQuoteCollection;

readonly class AssetPreFilterDataAggregate
{
    public function __construct(
        private KeyStatsInterface $keyStats,
        private HistoricalQuoteCollection $historicData,
    ) {
    }

    public function getKeyStats(): KeyStatsInterface
    {
        return $this->keyStats;
    }

    public function getRecentPriceData(): HistoricalQuoteCollection
    {
        return $this->historicData;
    }
}
