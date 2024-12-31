<?php

declare(strict_types=1);

namespace Signal\Core\Asset\Contracts\Components;

use Signal\Core\Asset\Contracts\KeyStatsInterface;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface ProvidesKeyStatsInterface
{
    /**
     * Provides key statistical data for the asset, ensuring the data is
     * as accurate and current as possible.
     */
    public function getKeyStats(): KeyStatsInterface;
}
