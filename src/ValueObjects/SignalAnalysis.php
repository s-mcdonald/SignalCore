<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects;

use Signal\Core\Enums\Signal;
use Signal\Core\ValueObjects\Contracts\ComplexValueObject;

/**
 * Represents a SignalAnalysis returned by Analyzers.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class SignalAnalysis extends ComplexValueObject
{
    public function __construct(
        private readonly Signal $signal,
        private readonly int|float|string $raw = '',
    ) {
        parent::__construct();
    }

    public function getSignal(): Signal
    {
        return $this->signal;
    }

    public function getRaw(): string
    {
        return (string) $this->raw;
    }

    protected function checkBoundary(): void
    {
        // implement rules here
    }
}
