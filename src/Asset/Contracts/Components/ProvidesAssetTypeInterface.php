<?php

declare(strict_types=1);

namespace Signal\Core\Asset\Contracts\Components;

use Signal\Core\Enums\AssetType;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface ProvidesAssetTypeInterface
{
    public function getType(): AssetType;
}
