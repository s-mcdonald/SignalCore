<?php

declare(strict_types=1);

namespace Signal\Core\Reporting;

use Signal\Core\Enums\InvestmentType;

interface AnalysisConfigurationInterface
{
    public function getInvestmentType(): InvestmentType;
}
