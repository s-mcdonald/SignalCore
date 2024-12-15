<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\OneOfStringValueObject;

/**
 * Currency.
 *
 * Represents a Currency.
 *
 * Currently the system only supports USD which is what you'll see below.
 * Until such time in the future we expand on available Currencies.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class Currency extends OneOfStringValueObject
{
    protected const ALLOWED_VALUES = [
        'USD',
    ];

    public function getValue(): string
    {
        return parent::getValue();
    }

    public function equals(Currency $currency): bool
    {
        return $this->getValue() === $currency->getValue();
    }

    protected function transform(string $value): void
    {
        $this->value = mb_strtoupper(trim($value));
    }
}
