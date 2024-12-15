<?php

declare(strict_types=1);

namespace Signal\Core\Enums;

/**
 * @author s.mcdonald@outlook.com.au
 */
enum Interval: int
{
    case OneMinute = 1;
    case FiveMinutes = 5;
    case TenMinutes = 10;
    case FifteenMinutes = 15;
    case ThirtyMinutes = 20;
    case OneHour = 30;
    case FourHour = 40;
    case Daily = 50;
    case Weekly = 60;
    case Monthly = 70;
}
