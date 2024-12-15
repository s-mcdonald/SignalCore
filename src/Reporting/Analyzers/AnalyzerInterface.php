<?php

declare(strict_types=1);

namespace Signal\Core\Reporting\Analyzers;

use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Enums\IndicatorType;
use Signal\Core\Enums\Interval;
use Signal\Core\ValueObjects\AnalyzerDescription;
use Signal\Core\ValueObjects\AnalyzerShortName;
use Signal\Core\ValueObjects\SignalAnalysis;
use Signal\Core\ValueObjects\SignalState;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface AnalyzerInterface
{
    public function getIndicatorType(): IndicatorType;

    public function getInterval(): Interval;

    public function getDescription(): AnalyzerDescription;

    public function getShortName(): AnalyzerShortName;

    public function analyze(AssetInterface $asset): SignalAnalysis;

    public function getSignalState(AssetInterface $asset): SignalState;
}
