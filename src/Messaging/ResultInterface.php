<?php

declare(strict_types=1);

namespace Signal\Core\Messaging;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface ResultInterface
{
    public function isSuccessful(): bool;
}
