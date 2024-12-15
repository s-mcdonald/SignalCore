<?php

declare(strict_types=1);

namespace Signal\Core\System;

use Signal\Core\Reporting\Analyzers\AnalyzerInterface;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface AnalyzerPluginInterface
{
    public function getAnalyzer(): AnalyzerInterface;
}
