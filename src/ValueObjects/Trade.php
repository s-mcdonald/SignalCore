<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\ComplexValueObject;

/**
 * @author s.mcdonald@outlook.com.au
 */
final class Trade extends ComplexValueObject
{
    public function __construct(
        private readonly AssetSymbol $symbol,
        private readonly Currency $currency,
        private readonly Exchange $exchange,
        private readonly MoneyAmount $stopLoss,
        private readonly MoneyAmount $takeProfit,
        private readonly MoneyAmount $entryPrice,
    ) {
        parent::__construct();
    }

    public function getSymbol(): AssetSymbol
    {
        return $this->symbol;
    }

    public function getCurrency(): Currency|null
    {
        return $this->currency;
    }

    public function getExchange(): Exchange|null
    {
        return $this->exchange;
    }

    public function getStopLoss(): MoneyAmount|null
    {
        return $this->stopLoss;
    }

    public function getTakeProfit(): MoneyAmount|null
    {
        return $this->takeProfit;
    }

    public function getEntryPrice(): MoneyAmount|null
    {
        return $this->entryPrice;
    }

    protected function checkBoundary(): void
    {
        // Needs work
    }
}
