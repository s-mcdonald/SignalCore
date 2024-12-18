<?php

declare(strict_types=1);

namespace Signal\Core\Asset;

use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Enums\AssetType;
use Signal\Core\ValueObjects\AssetShortName;
use Signal\Core\ValueObjects\AssetSymbol;

/**
 * This is the base 'Abstract' class for Asset to be used as an entity within
 * the main application domains. It is a shared abstract class.
 *
 * This will eventually replace the AssetVo object
 *
 * @author s.mcdonald@outlook.com.au
 */
abstract class AbstractAsset implements AssetInterface
{
    private AssetShortName $shortName;
    private AssetSymbol $symbol;
    private AssetType $type;

    public function getSymbol(): AssetSymbol
    {
        return $this->symbol;
    }

    public function getType(): AssetType
    {
        return $this->type;
    }

    public function getShortName(): AssetShortName
    {
        return $this->shortName;
    }
}
