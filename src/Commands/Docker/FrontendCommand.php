<?php

namespace Trinsyca\Trinsy\Commands;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FrontendCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('trinsy:docker-frontend')
            ->setDescription('Set up frontend Docker configuration.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<info>🚀 Setting up frontend Docker configuration...</info>");
        system("php vendor/trinsyca/docker/cmd/docker-frontend/setup-docker.php");
        return 0;
    }
}
