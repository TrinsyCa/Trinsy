<?php

namespace Trinsyca\Trinsy;

use Composer\Plugin\Capability\CommandProvider;
use Trinsyca\Trinsy\Commands\DockerFrontendCommand;

class CommandProviderImplementation implements CommandProvider
{
    public function getCommands()
    {
        return [
            new DockerFrontendCommand()
        ];
    }
}
