<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Enums\AssetType;
use Signal\Core\ValueObjects\Contracts\ComplexValueObject;

/**
 * AssetVo.
 *
 * This is the ValueObject for an Asset. Currently we only support Equities
 *
 * @author s.mcdonald@outlook.com.au
 */
final class AssetVo extends ComplexValueObject implements AssetInterface
{
    private readonly AssetShortName $shortName;

    public function __construct(
        private readonly AssetSymbol $symbol,
    ) {
        $this->shortName = new AssetShortName('');
        parent::__construct();
    }

    public function getSymbol(): AssetSymbol
    {
        return $this->symbol;
    }

    public function getType(): AssetType
    {
        return AssetType::Equities;
    }

    public function getShortName(): AssetShortName
    {
        return $this->shortName;
    }

    protected function checkBoundary(): void
    {
    }
}
