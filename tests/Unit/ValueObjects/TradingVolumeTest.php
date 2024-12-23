<?php

declare(strict_types=1);

namespace Signal\Core\Tests\Unit\ValueObjects;

use PHPUnit\Framework\TestCase;
use Signal\Core\ValueObjects\TradingVolume;

class TradingVolumeTest extends TestCase
{
    /**
     * @dataProvider provideDataForTestWithoutExceptions
     */
    public function testWithoutExceptions(int $value): void
    {
        $sut = new TradingVolume($value);

        static::assertEquals($value, $sut->getValue());
    }

    public static function provideDataForTestWithoutExceptions(): array
    {
        return [
             [0],[1], [2],[3], [100], [100_000_000],
        ];
    }
}
