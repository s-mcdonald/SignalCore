<?php

declare(strict_types=1);

namespace Signal\Core\Tests\ValueObjects;

use Signal\Core\ValueObjects\AssetSymbol;
use Signal\Core\ValueObjects\Currency;
use Signal\Core\ValueObjects\Exchange;
use Signal\Core\ValueObjects\MoneyAmount;
use Signal\Core\ValueObjects\Trade;
use PHPUnit\Framework\TestCase;

class TradeTest extends TestCase
{
    public function testConstructorInitializesProperties(): void
    {
        $symbol = new AssetSymbol("foo");
        $currency = new Currency("USD");
        $exchange = new Exchange("NASDAQ");
        $stopLoss = new MoneyAmount(100);
        $takeProfit = new MoneyAmount(150);
        $entryPrice = new MoneyAmount(80);

        $trade = new Trade(
            $symbol,
            $currency,
            $exchange,
            $stopLoss,
            $takeProfit,
            $entryPrice
        );

        $this->assertSame($symbol, $trade->getSymbol());
        $this->assertSame($currency, $trade->getCurrency());
        $this->assertSame($exchange, $trade->getExchange());
        $this->assertSame($stopLoss, $trade->getStopLoss());
        $this->assertSame($takeProfit, $trade->getTakeProfit());
        $this->assertSame($entryPrice, $trade->getEntryPrice());
    }
}
