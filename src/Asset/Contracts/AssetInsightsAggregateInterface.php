<?php

declare(strict_types=1);

namespace Signal\Core\Asset\Contracts;

use Signal\Core\Asset\Contracts\Components\ProvidesAssetInterface;
use Signal\Core\Asset\Contracts\Components\ProvidesHistoricalQuoteCollection;
use Signal\Core\Asset\Contracts\Components\ProvidesKeyStatsInterface;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface AssetInsightsAggregateInterface extends
    ProvidesAssetInterface,
    ProvidesKeyStatsInterface,
    ProvidesHistoricalQuoteCollection
{
}
