<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects\Contracts;

use Signal\Core\ValueObjects\Contracts\Traits\ComparesNumericAgainstZeroTrait;

/**
 * @author s.mcdonald@outlook.com.au
 */
abstract class NumericValueObject extends ValueObject
{
    use ComparesNumericAgainstZeroTrait;

    public function __construct(
        private readonly float|int $value,
    ) {
        parent::__construct();
    }

    protected function getValue(): float|int
    {
        return $this->value;
    }
}
