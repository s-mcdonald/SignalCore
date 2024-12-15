<?php

declare(strict_types=1);

namespace Signal\Core\Enums;

/**
 * @author s.mcdonald@outlook.com.au
 */
enum Signal: int
{
    case StrongSell = -30;
    case ModerateSell = -20;
    case Sell = -10;
    case Indecisive = 0;
    case Buy = 10;
    case ModerateBuy = 20;
    case StrongBuy = 30;
}
