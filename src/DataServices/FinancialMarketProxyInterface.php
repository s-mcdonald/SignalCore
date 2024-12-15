<?php

declare(strict_types=1);

namespace Signal\Core\DataServices;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface FinancialMarketProxyInterface extends FinancialMarketDataProviderInterface
{
    public function findAll(int|null $max = null): array;
}
