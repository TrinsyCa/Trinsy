<?php

namespace Trinsyca\Trinsy;

use Composer\Plugin\Capability\CommandProvider;
use Trinsyca\Trinsy\Commands\Docker;

class CommandProviderImplementation implements CommandProvider
{
    public function getCommands()
    {
        return [
            new Docker\FrontendCommand(),
            new Docker\BackendCommand(),
            new Docker\FullstackCommand()
        ];
    }
}
