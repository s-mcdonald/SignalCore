<?php

namespace Signal\Core\Tests\System;

use Signal\Core\Collections\AnalyzerCollection;
use Signal\Core\Collections\DataProviderCollection;
use Signal\Core\System\SystemPlugin;
use PHPUnit\Framework\TestCase;

class SystemPluginTest extends TestCase
{
    public function test__construct()
    {
        $sut = $this->createSystemPlugin();

        static::assertEquals([],$sut->getAnalyzerCollection()->toArray());
        static::assertEquals([],$sut->getDataProvidersCollection()->toArray());
    }

    private function createSystemPlugin(): SystemPlugin
    {
        return new class extends SystemPlugin {

            public function getAnalyzerCollection(): AnalyzerCollection
            {
                return new AnalyzerCollection([]);
            }

            public function getDataProvidersCollection(): DataProviderCollection
            {
                return new DataProviderCollection([]);
            }
        };
    }
}
