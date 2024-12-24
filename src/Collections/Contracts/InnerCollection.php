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
        if (false === empty($items)) {
            $v = array_values($items);
            $this->setType($v[0]);

            // Add all items while ensuring type consistency
            foreach ($v as $result) {
                $this->ensureType($result);
            }

            // Assign validated items to the internal array
            $this->items = $v;
        }
    }

    public function __toString(): string
    {
        return '{' . __CLASS__ . '}=' . spl_object_hash($this);
    }

    public function getType(): string
    {
        if (false === isset($this->type)) {
            return '';
        }

        return $this->type;
    }

    public function addAll(CollectionInterface $results): void
    {
        foreach ($results->getIterator() as $result) {
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
        if (true === isset($this->items)) {
            $this->ensureType($item);
        } else {
            $this->setType($item);
        }

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
        if (false === isset($this->type)) {
            return;
        }
        $receivedType = \gettype($a);
        $collectionType = $this->type;

        if ($receivedType !== $collectionType) {
            throw new InvalidArgumentException(
                sprintf(
                    'All items must be of the same type, Received: %s, Expected: %s',
                    $receivedType,
                    $collectionType,
                ),
            );
        }
    }

    private function setType($item): void
    {
        $this->type = \gettype($item);
    }
}
