<?php

namespace Trinsyca\Trinsy\Commands\Docker;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RemoveSetup extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('trinsy:docker-remove')
            ->setDescription('Set up backend Docker configuration.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<info>🚀 Setting up backend Docker configuration...</info>");
        system("php vendor/trinsyca/docker/cmd/remove-docker.php");
        return 0;
    }
}
