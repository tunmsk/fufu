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
        $this->setName('generate:command');
        $this->addArgument("name", InputArgument::REQUIRED, 'Nom de la commande');
        $this->setDescription('Generate command class');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');

        $text = file_get_contents(__DIR__.'/templates/command.template.php');

        file_put_contents(__DIR__.'/'.$name.'.php', preg_replace('/PregReplace/', "$name", $text));

        $output->writeln("Commande générée");
    }

}
