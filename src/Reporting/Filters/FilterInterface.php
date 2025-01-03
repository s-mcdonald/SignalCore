<?php

declare(strict_types=1);

namespace Signal\Core\Reporting\Filters;

use Signal\Core\Asset\AssetPreFilterDataAggregate;
use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Reporting\AnalysisConfigurationInterface;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface FilterInterface
{
    /**
     * Determines whether a given asset should be excluded from the final data set.
     *
     * This method returns `true` to indicate that the asset does not meet the requirements
     * of the analysis and should be filtered out. For example, given the following data:
     *
     *  AAPL: false,
     *  TSLA: true,
     *  NKLA: true,
     *
     * Only `AAPL` would be included in the final result, as it is not marked for exclusion.
     *
     * @param AssetInterface $asset the asset being evaluated
     * @param AnalysisConfigurationInterface $configuration the configuration defining the analysis criteria
     * @param AssetPreFilterDataAggregate $stockData additional stock-related data used in the filtering process
     *
     * @return bool `true` if the asset should be excluded from the final data set, `false` otherwise
     *
     * @experimental
     */
    public function filter(
        AssetInterface $asset,
        AnalysisConfigurationInterface $configuration,
        AssetPreFilterDataAggregate $stockData,
    ): bool;
}
