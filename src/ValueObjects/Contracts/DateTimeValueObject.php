<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects\Contracts;

use DateTimeInterface;

/**
 * @author s.mcdonald@outlook.com.au
 */
abstract class DateTimeValueObject extends ValueObject
{
    public function __construct(
        private readonly DateTimeInterface $value,
    ) {
        parent::__construct();
    }

    protected function getValue(): DateTimeInterface
    {
        return $this->value;
    }
}
