<?php

declare(strict_types=1);

namespace Signal\Core\Enums;

/**
 * @author s.mcdonald@outlook.com.au
 */
enum InvestmentType: int
{
    case IntraDay = 1;
    case ShortTerm = 2;
    case LongTerm = 3;
}
