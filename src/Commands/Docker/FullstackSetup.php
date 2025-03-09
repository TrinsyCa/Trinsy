<?php

namespace Trinsyca\Trinsy\Commands\Docker;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FullstackSetup extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('trinsy:docker-fullstack')
            ->setDescription('Set up fullstack Docker configuration.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<info>🚀 Setting up fullstack Docker configuration...</info>");
        system("php vendor/trinsyca/docker/cmd/docker-fullstack/setup-docker.php");
        return 0;
    }
}
