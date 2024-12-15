<?php

declare(strict_types=1);

namespace Signal\Core\Collections\Contracts;

use ArrayIterator;
use Closure;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface CollectionInterface
{
    public function clear(): void;

    public function indexOf($element): false|int;

    public function contains($item): bool;

    public function isEmpty(): bool;

    public function size(): int;

    public function count(): int;

    public function add($item): void;

    public function remove($item): void;

    public function addAll(self $results): void;

    public function all(Closure $callback): bool;

    public function first(Closure|null $callback = null): mixed;

    public function map(Closure $callback): InnerCollection;

    public function filter(Closure $callback): InnerCollection;

    public function existsBy(Closure $callback): bool;

    public function getIterator(): ArrayIterator;

    public function toArray(): array;
}
