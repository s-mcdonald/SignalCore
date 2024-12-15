<?php

declare(strict_types=1);

namespace Signal\Core\ValueObjects\Traits;

use LogicException;

/**
 * Ensure that the VO is only initialized once.
 *
 * @author s.mcdonald@outlook.com.au
 */
trait EnsureSingleInitialization
{
    private bool $initialized = false;

    final protected function initialize(): void
    {
        if ($this->initialized) {
            throw new LogicException('This object has already been initialized.');
        }

        $this->initialized = true;
    }
}
