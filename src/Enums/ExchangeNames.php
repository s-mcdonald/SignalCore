<?php

declare(strict_types=1);

namespace Signal\Core\Enums;

/**
 * @author s.mcdonald@outlook.com.au
 */
enum ExchangeNames: string
{
    case NASDAQ = 'NASDAQ';
    case NYSE = 'NYSE';
    case CCC = 'CCC';
    case MRX = 'MEXICO';
    case ASX = 'ASX';

    public static function exist(string $name): bool
    {
        foreach (self::cases() as $c) {
            if ($c->name === $name) {
                return true;
            }
        }

        return false;
    }
}
