<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\ValueObjects\Contracts\OneOfStringValueObject;

/**
 * PluginType.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class PluginType extends OneOfStringValueObject
{
    protected const ALLOWED_VALUES = [
        'ANALYZER',
    ];

    public function getValue(): string
    {
        return parent::getValue();
    }

    public function equals(PluginType $plugin): bool
    {
        return $this->getValue() === $plugin->getValue();
    }

    protected function transform(string $value): void
    {
        $this->value = mb_strtoupper(trim($value));
    }
}
