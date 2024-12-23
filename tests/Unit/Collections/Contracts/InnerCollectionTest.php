<?php

declare(strict_types=1);

namespace Signal\Core\Tests\Unit\Collections\Contracts;

use ArrayIterator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Signal\Core\Collections\Contracts\InnerCollection;
use stdClass;

class InnerCollectionTest extends TestCase
{
    public function testConstructorSetsTypeCorrectly(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $this->assertSame('integer', $collection->getType());

        $collection = new InnerCollection(['a', 'b', 'c']);
        $this->assertSame('string', $collection->getType());

        $collection = new InnerCollection([new stdClass()]);
        $this->assertSame('object', $collection->getType());
    }

    public function testConstructorThrowsExceptionWithMixedTypes(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new InnerCollection([1, 'string']);
    }

    public function testAddItems(): void
    {
        $collection = new InnerCollection([1]);
        $collection->add(2);
        $this->assertTrue($collection->contains(2));
        $this->assertSame(2, $collection->size());
    }

    public function testAddThrowsExceptionForInvalidType(): void
    {
        $collection = new InnerCollection([1, 2, 3]);

        $this->expectException(InvalidArgumentException::class);
        $collection->add('string');
    }

    public function testRemoveItems(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $collection->remove(2);
        $this->assertFalse($collection->contains(2));
    }

    public function testToArray(): void
    {
        $data = [1, 2, 3];
        $collection = new InnerCollection($data);
        $this->assertSame($data, $collection->toArray());
    }

    public function testIsEmpty(): void
    {
        $collection = new InnerCollection();
        $this->assertTrue($collection->isEmpty());

        $collection->add(1);
        $this->assertFalse($collection->isEmpty());
    }

    public function testContains(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $this->assertTrue($collection->contains(2));
        $this->assertFalse($collection->contains(99));
    }

    public function testSize(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $this->assertSame(3, $collection->size());
    }

    public function testFilter(): void
    {
        $collection = new InnerCollection([1, 2, 3, 4, 5]);
        $filtered = $collection->filter(static fn ($item) => $item > 3);
        $this->assertSame([4, 5], $filtered->toArray());
        $this->assertInstanceOf(InnerCollection::class, $filtered);
    }

    public function testMap(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $mapped = $collection->map(fn ($item) => $item * 2);
        $this->assertSame([2, 4, 6], $mapped->toArray());
        $this->assertInstanceOf(InnerCollection::class, $mapped);
    }

    public function testFirst(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $this->assertSame(1, $collection->first());

        $filtered = $collection->first(fn ($key, $item) => $item > 1);
        $this->assertSame(2, $filtered);
    }

    public function testClear(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $collection->clear();
        $this->assertTrue($collection->isEmpty());
    }

    public function testIndexOf(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $this->assertSame(1, $collection->indexOf(2));
        $this->assertFalse($collection->indexOf(99));
    }

    public function testExistsBy(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $this->assertTrue($collection->existsBy(fn ($key, $item) => $item > 2));
        $this->assertFalse($collection->existsBy(fn ($key, $item) => $item > 999));
    }

    public function testAddAll(): void
    {
        $collection1 = new InnerCollection([1, 2]);
        $collection2 = new InnerCollection([3, 4]);

        $collection1->addAll($collection2);

        $this->assertSame([1, 2, 3, 4], $collection1->toArray());
    }

    public function testAddAllThrowsExceptionForDifferentType(): void
    {
        $collection1 = new InnerCollection([1, 2]);
        $collection2 = new InnerCollection(['string']);

        $this->expectException(InvalidArgumentException::class);
        $collection1->addAll($collection2);
    }

    public function testAll(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $this->assertTrue($collection->all(fn ($key, $item) => $item > 0));
        $this->assertFalse($collection->all(fn ($key, $item) => $item > 1));
    }

    public function testGetIterator(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $iterator = $collection->getIterator();

        $this->assertInstanceOf(ArrayIterator::class, $iterator);
        $this->assertSame([1, 2, 3], iterator_to_array($iterator));
    }

    public function testToString(): void
    {
        $collection = new InnerCollection([1, 2, 3]);
        $stringRepresentation = $collection->__toString();

        $this->assertStringContainsString('InnerCollection', $stringRepresentation);
    }
}
