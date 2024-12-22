<?php

declare(strict_types=1);

namespace Signal\Core\Reporting\Filters;

use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Reporting\AnalysisConfigurationInterface;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface FilterInterface
{
    public function filter(AssetInterface $asset, AnalysisConfigurationInterface $configuration): bool;
}
