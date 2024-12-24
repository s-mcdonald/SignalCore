<?php

declare(strict_types=1);

namespace Signal\Core\Collections;

use ArrayIterator;
use Closure;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Collections\Contracts\CollectionInterface;

/**
 * @author s.mcdonald@outlook.com.au
 */
class AssetCollection implements Countable, IteratorAggregate
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

    public function indexOf(AssetInterface $element): false|int
    {
        return $this->innerCollection->indexOf($element);
    }

    public function existsBy(Closure $callback): bool
    {
        return $this->innerCollection->existsBy($callback);
    }

    public function add(AssetInterface $item): void
    {
        $this->innerCollection->add($item);
    }

    public function remove(AssetInterface $item): void
    {
        $this->innerCollection->remove($item);
    }

    public function clear(): void
    {
        $this->innerCollection->clear();
    }

    public function contains(AssetInterface $item): bool
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

    public function first(Closure|null $callback = null): AssetInterface|null
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
            if (false === ($item instanceof AssetInterface)) {
                throw new InvalidArgumentException(
                    sprintf(
                        'All items must be of type: %s',
                        AssetInterface::class,
                    ),
                );
            }
        }
    }
}
