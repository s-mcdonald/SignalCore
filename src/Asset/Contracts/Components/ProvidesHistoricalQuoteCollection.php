<?php

declare(strict_types=1);

namespace Signal\Core\Asset\Contracts\Components;

use Signal\Core\Collections\HistoricalQuoteCollection;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface ProvidesHistoricalQuoteCollection
{
    /**
     * Retrieves recent pricing data for the asset, covering
     * up to the last six months if available.
     */
    public function getHistoricalQuoteData(): HistoricalQuoteCollection;
}
