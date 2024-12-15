<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects\Contracts;

/**
 * @author s.mcdonald@outlook.com.au
 */
abstract class IntegerValueObject extends NumericValueObject
{
    public function __construct(
        private readonly int $value,
    ) {
        parent::__construct($value);
    }

    protected function getValue(): int
    {
        return $this->value;
    }
}
