<?php

declare(strict_types=1);

namespace Signal\Core\System;

use Signal\Core\Collections\PluginCollection;

/**
 * @author s.mcdonald@outlook.com.au
 */
interface SystemPluginInterface
{
    public function getRegisteredPlugins(): PluginCollection;
}
