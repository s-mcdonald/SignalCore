<?php

declare(strict_types=1);

namespace Signal\Core\Asset\Contracts;

use Signal\Core\ValueObjects\MoneyAmount;
use Signal\Core\ValueObjects\PeRatio;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface KeyStatsInterface
{
    public function getValuation(): MoneyAmount|null;

    public function getRevenuePerShare(): MoneyAmount|null;

    public function getTrailingPe(): PeRatio|null;

    public function getForwardPe(): PeRatio|null;

    //    public function getProfitMargins(): float|int|null;
    //
    //    public function getFloatShares(): float|int|null;
    //
    //    public function getSharesOutstanding(): float|int|null;
    //
    //    public function getSharesShort(): float|int|null;
    //
    //    public function getSharesShortPriorMonth(): float|int|null;
    //
    //    public function getShortRatio(): float|int|null;
    //
    //    public function getBeta(): float|int|null;
    //
    //    public function getTrailingEps(): float|int|null;
}
