<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use InvalidArgumentException;
use Signal\Core\Enums\ExchangeNames;
use Signal\Core\ValueObjects\Contracts\ComplexValueObject;

/**
 * Exchange.
 *
 * Represents Exchange where an asset is registered.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class Exchange extends ComplexValueObject
{
    public function __construct(
        private readonly string $name,
    ) {
        parent::__construct();
    }

    protected function checkBoundary(): void
    {
        // ensure value is one of the Enums ExchangeName
        if ('' === $this->name) {
            throw new InvalidArgumentException('Exchange name cannot be empty');
        }

        if (false === ExchangeNames::exist($this->name)) {
            throw new InvalidArgumentException('Exchange name is not valid');
        }
    }
}
