<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\StringValueObject;

/**
 * AssetSymbol.
 *
 * This is the AssetSymbol for an Asset. ex TSLA or AAPL.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class AssetSymbol extends StringValueObject
{
    private const MIN_LENGTH = 1;

    private const MAX_LENGTH = 50;

    public function equals(AssetSymbol|string $symbol): bool
    {
        if ($symbol instanceof self) {
            return mb_strtoupper(parent::getValue()) === mb_strtoupper($symbol->getValue());
        }

        return mb_strtoupper(parent::getValue()) === mb_strtoupper(trim($symbol));
    }

    public function isOneOf(AssetSymbol|string ...$symbols): bool
    {
        foreach ($symbols as $symbol) {
            if ($this->equals($symbol)) {
                return true;
            }
        }

        return false;
    }

    public function getValue(): string
    {
        return parent::getValue();
    }

    protected function checkBoundary(): void
    {
        self::assertMinLength(self::MIN_LENGTH, $this);
        self::assertMaxLength(self::MAX_LENGTH, $this);
    }
}
