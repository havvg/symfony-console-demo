<?php

namespace Demo\Tests\Command;

use Symfony\Component\Console\Tester\CommandTester;

class AbstractCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testExecuteAppendWithoutFile()
    {
        $command = $this->getMockForAbstractClass(
            'Demo\Command\AbstractCommand',
            array('TestRun'),
            'TestRunCommand',
            true
        );

        $this->setExpectedException('InvalidArgumentException');

        $commandTester = new CommandTester($command);
        $commandTester->execute(array('--append' => true));
    }
}