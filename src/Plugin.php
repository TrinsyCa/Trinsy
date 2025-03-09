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
        if (!$this->isPackageInstalled('trinsyca/docker')) {
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

    private function isPackageInstalled(string $packageName): bool
{
    $installedPackages = $this->composer->getRepositoryManager()->getLocalRepository()->getPackages();
    
    foreach ($installedPackages as $package) {
        if ($package->getName() === $packageName) {
            return true; // Paket zaten yüklü
        }
    }
    return false; // Paket eksik
}

    private function runComposerCommand(string $command)
    {
        $process = new \Symfony\Component\Process\Process(['composer', $command]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \RuntimeException("Error executing Composer command: $command");
        }
    }
}
