<?php

declare(strict_types=1);

namespace Signal\Core\Asset\Contracts;

use Signal\Core\Enums\AssetType;
use Signal\Core\ValueObjects\AssetShortName;
use Signal\Core\ValueObjects\AssetSymbol;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface AssetInterface
{
    public function getType(): AssetType;

    public function getSymbol(): AssetSymbol;

    public function getShortName(): AssetShortName;
}
