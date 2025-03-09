<?php

namespace Trinsyca\Trinsy;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\Capability\CommandProvider;

class Plugin implements PluginInterface, Capable
{
    private $composer;
    private $io;

    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;

        $io->write("<info>✅ Trinsy Plugin activated!</info>");

        // trinsyca/docker yüklü mü kontrol et
        if (!$this->isPackageInstalled(__DIR__ . 'vendor/trinsyca/docker')) {
            $io->write("<comment>⚠️ trinsyca/docker is not installed. Installing now...</comment>");
            $this->runComposerCommand('require trinsyca/docker');
        }
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
        $io->write("<info>⚠️ Trinsy Plugin deactivated!</info>");
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
        $io->write("<info>❌ Trinsy Plugin uninstalled!</info>");
    }

    public function getCapabilities()
    {
        return [
            CommandProvider::class => CommandProviderImplementation::class
        ];
    }

    private function isPackageInstalled($packageName)
    {
        $installedRepo = $this->composer->getRepositoryManager()->getLocalRepository();
        return $installedRepo->findPackage($packageName, '*') !== null;
    }

    private function runComposerCommand($command)
    {
        $command = 'composer ' . $command;
        passthru($command);
    }
}
