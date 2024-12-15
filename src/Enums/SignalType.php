<?php

declare(strict_types=1);

namespace Signal\Core\Enums;

/**
 * @author s.mcdonald@outlook.com.au
 */
enum SignalType: int
{
    case EntryPoint = 1;
    case ExitPoint = 2;
}
