<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CacheClear extends Command
{
    protected function configure()
    {
        $this->setName('clear:cache');
        $this->setDescription('Vide le dossier cache de twig');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $files = __DIR__.'/../cache/';
        $output->writeln("Traitement des fichiers de cache");
        $this->delete_directory($files);
        $output->writeln("Cache vidé avec succès");
    }
    protected function delete_directory($dirname) {
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file) && $file != ".gitkeep")
                    unlink($dirname."/".$file);
                else
                    $this->delete_directory($dirname.'/'.$file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }
}
