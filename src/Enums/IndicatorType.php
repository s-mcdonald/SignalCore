<?php

declare(strict_types=1);

namespace Signal\Core\Enums;

/**
 * @author s.mcdonald@outlook.com.au
 */
enum IndicatorType: int
{
    // Charts
    case Candlestick = 1;
    case Histogram = 2;
    case Oscillator = 3;
    case HeatMap = 4;
    case Trend = 5;

    // Metric-Data and Others
    case Metrics = 6;
}
