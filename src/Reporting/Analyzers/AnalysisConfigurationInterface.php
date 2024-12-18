<?php

declare(strict_types=1);

namespace Signal\Core\Reporting\Analyzers;

use Signal\Core\Enums\InvestmentType;

interface AnalysisConfigurationInterface
{
    public function getInvestmentType(): InvestmentType;
}
