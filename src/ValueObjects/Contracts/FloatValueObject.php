<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects\Contracts;

/**
 * @author s.mcdonald@outlook.com.au
 */
abstract class FloatValueObject extends NumericValueObject
{
    public function __construct(
        private readonly float $value,
    ) {
        parent::__construct($value);
    }

    protected function getValue(): float
    {
        return $this->value;
    }
}
