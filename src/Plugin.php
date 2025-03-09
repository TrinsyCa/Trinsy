<?php

namespace Trinsyca\Trinsy;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\Capability\CommandProvider;
use Symfony\Component\Process\Process;

class Plugin implements PluginInterface, Capable
{
    private Composer $composer;
    private IOInterface $io;

    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;

        $io->write("<info>✅ Trinsy Plugin activated!</info>");
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

    // Eğer trinsyca/docker yüklü değilse yükleyip sonra devam et
    public function ensureDockerPackageInstalled(string $command)
    {
        if (!$this->isPackageInstalled('trinsyca/docker')) {
            $this->io->write("<comment>⚠️ trinsyca/docker is not installed. Installing now...</comment>");
            $this->runComposerCommand('require trinsyca/docker');
        }

        // Paket yüklendikten sonra komutu çalıştır
        $this->runComposerCommand($command);
    }

    // Composer ile paket yüklü mü kontrol et
    private function isPackageInstalled(string $packageName): bool
    {
        $installedPackages = $this->composer->getRepositoryManager()->getLocalRepository()->getPackages();
        
        foreach ($installedPackages as $package) {
            if ($package->getName() === $packageName) {
                return true;
            }
        }
        return false;
    }

    // Composer komutu çalıştır
    private function runComposerCommand(string $command)
    {
        $process = new Process(['composer', $command]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \RuntimeException("Error executing Composer command: $command");
        }
    }
}
