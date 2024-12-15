<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects\Contracts;

use Signal\Core\ValueObjects\Traits\EnsureSingleInitialization;

/**
 * @author s.mcdonald@outlook.com.au
 */
abstract class ValueObject
{
    use EnsureSingleInitialization;

    public function __construct()
    {
        $this->initialize();
        $this->checkBoundary();
    }

    protected function checkBoundary(): void
    {
    }
}
