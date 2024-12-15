<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects\Contracts;

use InvalidArgumentException;
use Stringable;

/**
 * @author s.mcdonald@outlook.com.au
 */
abstract class OneOfStringValueObject extends ValueObject implements Stringable
{
    protected const ALLOWED_VALUES = [];

    protected string $value;

    public function __construct(
        string $value,
    ) {
        if (empty(static::ALLOWED_VALUES)) {
            throw new InvalidArgumentException('Allowed values not defined in the class.');
        }

        $this->transform($value);

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

    final protected function checkBoundary(): void
    {
        if (false === in_array($this->value, static::ALLOWED_VALUES, true)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Invalid value '%s'. Allowed values are: [%s].",
                    $this->value,
                    implode(', ', static::ALLOWED_VALUES),
                ),
            );
        }
    }

    /**
     * Performs a transformation of the value before checking its boundary.
     */
    protected function transform(string $value): void
    {
        $this->value = $value;
    }
}
