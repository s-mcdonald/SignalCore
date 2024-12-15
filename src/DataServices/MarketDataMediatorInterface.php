<?php

declare(strict_types=1);

namespace Signal\Core\DataServices;

use DateTimeInterface;
use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Collections\AssetCollection;
use Signal\Core\Enums\AssetType;
use Signal\Core\Enums\Interval;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface MarketDataMediatorInterface
{
    /**
     * Uses the search capability of each provider to see if they have access to the Asset.
     */
    public function searchAllProvidersForAsset(string $symbol, AssetType $type): AssetCollection;

    public function findBestSuitedDataProviderBasedOnAsset(AssetInterface $asset): FinancialMarketDataProviderInterface;

    /**
     * This is where we can determine the data provider based on the input requested.
     */
    public function findBestSuitedDataProviderBasedOnQuery(
        AssetInterface $asset,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate,
        Interval $interval = Interval::Daily,
    ): FinancialMarketDataProviderInterface;
}
