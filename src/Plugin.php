<?php

namespace Trinsyca\Trinsy;

use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\Capability\CommandProvider;

class Plugin implements PluginInterface, Capable
{
    public function activate(\Composer\Composer $composer, \Composer\IO\IOInterface $io)
    {
        $io->write("<info>✅ Trinsy Plugin activated!</info>");
    }

    public function deactivate(\Composer\Composer $composer, \Composer\IO\IOInterface $io)
    {
        $io->write("<info>⚠️ Trinsy Plugin deactivated!</info>");
    }

    public function uninstall(\Composer\Composer $composer, \Composer\IO\IOInterface $io)
    {
        $io->write("<info>❌ Trinsy Plugin uninstalled!</info>");
    }

    public function getCapabilities()
    {
        return [
            CommandProvider::class => CommandProviderImplementation::class
        ];
    }
}
