<?php

declare(strict_types=1);

namespace Signal\Core\Collections\Contracts;

use ArrayIterator;
use Closure;
use Countable;
use InvalidArgumentException;

/**
 * Dont use this class directly, see AssetCollection as an example of how to implement a Collection.
 *
 * @author s.mcdonald@outlook.com.au
 */
final class InnerCollection implements CollectionInterface, Countable
{
    private string $type;

    private array $items = [];

    public function __construct(
        array $items = [],
    ) {
        if (\count($items) > 0) {
            $v = array_values($items);
            $this->setType($v[0]);

            foreach ($v as $result) {
                //            $this->ensureType($result);
                $this->items[] = $result;
            }
        }
    }

    public function __toString(): string
    {
        return '{' . __CLASS__ . '}=' . spl_object_hash($this);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function addAll(CollectionInterface $results): void
    {
        foreach ($results as $result) {
            $this->ensureType($result);
            $this->items[] = $result;
        }
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function indexOf($element): false|int
    {
        return array_search($element, $this->items, true);
    }

    public function existsBy(Closure $callback): bool
    {
        foreach ($this->items as $key => $element) {
            if ($callback($key, $element)) {
                return true;
            }
        }

        return false;
    }

    public function add($item): void
    {
        $this->ensureType($item);
        $this->items[] = $item;
    }

    public function remove($item): void
    {
        $this->items = array_filter($this->items, static fn ($value) => $value !== $item);
    }

    public function clear(): void
    {
        $this->items = [];
    }

    public function contains($item): bool
    {
        return \in_array($item, $this->items, true);
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function size(): int
    {
        return \count($this->items);
    }

    public function all(Closure $callback): bool
    {
        foreach ($this->items as $key => $element) {
            if (!$callback($key, $element)) {
                return false;
            }
        }

        return true;
    }

    public function first(Closure|null $callback = null): mixed
    {
        if (null === $callback) {
            return reset($this->items);
        }

        foreach ($this->items as $key => $element) {
            if ($callback($key, $element)) {
                return $element;
            }
        }

        return null;
    }

    public function map(Closure $callback): self
    {
        return new self(array_map($callback, $this->items));
    }

    public function filter(Closure $callback): self
    {
        return new self(array_filter($this->items, $callback));
    }

    public function toArray(): array
    {
        return $this->items;
    }

    public function count(): int
    {
        return $this->size();
    }

    private function ensureType($a): void
    {
        if (\gettype($a) !== $this->type) {
            throw new InvalidArgumentException('All items must be of the same type.');
        }
    }

    private function setType($item): void
    {
        if (\is_object($item)) {
            $this->type = $item::class;

            return;
        }

        if (\is_array($item)) {
            $this->type = 'array';

            return;
        }

        $this->type = \gettype($item);
    }
}
