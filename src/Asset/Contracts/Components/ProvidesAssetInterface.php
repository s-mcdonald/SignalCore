<?php

declare(strict_types=1);

namespace Signal\Core\Asset\Contracts\Components;

use Signal\Core\Asset\Contracts\AssetInterface;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface ProvidesAssetInterface
{
    /**
     * Retrieves the asset associated with the aggregated insights.
     */
    public function getAsset(): AssetInterface;
}
