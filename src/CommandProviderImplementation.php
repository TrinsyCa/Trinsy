<?php

namespace Trinsyca\Trinsy;

use Composer\Plugin\Capability\CommandProvider;
use Trinsyca\Trinsy\Commands\Docker as DockerCmd;

class CommandProviderImplementation implements CommandProvider
{
    public function getCommands()
    {
        return [
            new DockerCmd\FrontendSetup(),
            new DockerCmd\BackendSetup(),
            new DockerCmd\FullstackSetup(),
        ];
    }
}
