<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects\Contracts;

use InvalidArgumentException;
use Stringable;

/**
 * @author s.mcdonald@outlook.com.au
 */
abstract class StringValueObject extends ValueObject implements Stringable
{
    public function __construct(
        protected readonly string $value,
    ) {
        parent::__construct();
    }

    public function __toString(): string
    {
        return $this->value;
    }

    protected function getValue(): string
    {
        return $this->value;
    }

    protected static function assertMaxLength(int $maxLength, self $vo): void
    {
        if (mb_strlen($vo->value) > $maxLength) {
            throw new InvalidArgumentException(static::class . ' String value is too long.');
        }
    }

    protected static function assertMinLength(int $minLength, self $vo): void
    {
        if (mb_strlen($vo->value) < $minLength) {
            throw new InvalidArgumentException(static::class . ' String value is too short.');
        }
    }
}
