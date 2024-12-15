<?php

declare(strict_types=1);

namespace Signal\Core\Collections;

use ArrayIterator;
use Closure;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use Signal\Core\Collections\Contracts\CollectionInterface;
use Signal\Core\System\SystemPluginInterface;

/**
 * @author s.mcdonald@outlook.com.au
 */
class PluginCollection implements Countable, IteratorAggregate
{
    private CollectionInterface $innerCollection;

    public function __construct(
        array $items = [],
    ) {
        self::assertArray($items);

        $this->innerCollection = new Contracts\InnerCollection($items);
    }

    public function __toString(): string
    {
        return '{' . __CLASS__ . '}=' . spl_object_hash($this);
    }

    public function indexOf(SystemPluginInterface $element): false|int
    {
        return $this->innerCollection->indexOf($element);
    }

    public function existsBy(Closure $callback): bool
    {
        return $this->innerCollection->existsBy($callback);
    }

    public function add(SystemPluginInterface $item): void
    {
        $this->innerCollection->add($item);
    }

    public function remove(SystemPluginInterface $item): void
    {
        $this->innerCollection->remove($item);
    }

    public function clear(): void
    {
        $this->innerCollection->clear();
    }

    public function contains(SystemPluginInterface $item): bool
    {
        return $this->innerCollection->contains($item);
    }

    public function isEmpty(): bool
    {
        return $this->innerCollection->isEmpty();
    }

    public function size(): int
    {
        return $this->innerCollection->size();
    }

    public function all(Closure $callback): bool
    {
        return $this->innerCollection->all($callback);
    }

    public function first(Closure|null $callback = null): SystemPluginInterface|null
    {
        return $this->innerCollection->first($callback);
    }

    public function map(Closure $callback): self
    {
        return new self($this->innerCollection->map($callback)->toArray());
    }

    public function filter(Closure $callback): static
    {
        return new self($this->innerCollection->filter($callback)->toArray());
    }

    public function addAll(self $assetCollection): void
    {
        foreach ($assetCollection as $asset) {
            $this->innerCollection->add($asset);
        }
    }

    public function getIterator(): ArrayIterator
    {
        return $this->innerCollection->getIterator();
    }

    public function toArray(): array
    {
        return $this->innerCollection->toArray();
    }

    public function count(): int
    {
        return $this->innerCollection->count();
    }

    private static function assertArray(array $items): void
    {
        foreach ($items as $item) {
            if (false === ($item instanceof SystemPluginInterface)) {
                throw new InvalidArgumentException('All items must be of type: ' . SystemPluginInterface::class);
            }
        }
    }
}
