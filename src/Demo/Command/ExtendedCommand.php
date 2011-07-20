<?php

namespace Demo\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ExtendedCommand extends Command
{
    /**
     * Configure this Command.
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('demo:extended-command')
            ->setAliases(array(
                'demo:ext',
            ))
            ->setDescription('Extended command demo.')
            ->setHelp('Includes some additions for demo purposes.')
        ;

        $this->addOption('force', 'f', InputOption::VALUE_NONE, 'The force is with you!');
    }

    /**
     * This task does actually nothing.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int Exit code of this command.
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption('force'))
        {
            $output->write("\n\tMay the force be with you\n\n");
        }

        $output->write("Extended Demo completed.\n");

        return 0;
    }
}