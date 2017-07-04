<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateCommand extends Command
{
    protected function configure()
    {
        $this->setName('generate:controller');
        $this->addArgument("name", InputArgument::REQUIRED, 'Nom du controller');
        $this->setDescription('Generate controller class');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');

        $text = file_get_contents(__DIR__.'/templates/controller.template.php');

        file_put_contents('../app/Controllers/'.$name.'Controller.php', preg_replace('/PregReplace/', "$name", $text));

        $output->writeln("Controller généré");
    }

}
