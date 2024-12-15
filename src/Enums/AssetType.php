<?php

declare(strict_types=1);

namespace Signal\Core\Enums;

/**
 * @author s.mcdonald@outlook.com.au
 */
enum AssetType: string
{
    case Equities = 'EQ'; // Stocks
    case CryptoCurrency = 'CC';
}
