<?php

namespace Demo\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractCommand extends Command
{
    protected function configure()
    {
        $this->addArgument('file', InputArgument::OPTIONAL, 'The filename to save the CSV to.');
        $this->addOption('append', 'a', InputOption::VALUE_NONE, 'A flag whether to append the resulting CSV to the given file or replace it.');

        $this->setHelp(sprintf('Usage: <info>./console.php %s</info>', $this->getName()));
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('append') and !$input->getArgument('file')) {
            throw new \InvalidArgumentException('The "append" option has been set, but no "file" argument has been passed. Please add the filename to save the CSV to.');
        }
    }
}
