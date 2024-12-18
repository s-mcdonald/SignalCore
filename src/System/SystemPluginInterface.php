<?php

declare(strict_types=1);

namespace Signal\Core\System;

use Signal\Core\Collections\AnalyzerCollection;
use Signal\Core\Collections\DataProviderCollection;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface SystemPluginInterface
{
    public function getAnalyzerCollection(): AnalyzerCollection;

    public function getDataProvidersCollection(): DataProviderCollection;
}
