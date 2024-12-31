<?php

declare(strict_types=1);

namespace Signal\Core\Lex;

/**
 * Only support modern serialization.
 */
interface SerializableInterface
{
    public function __serialize(): array;

    public function __unserialize(array $data): void;
}
