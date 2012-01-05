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

    public function testExecuteWithFile()
    {
        $command = $this->getMockForAbstractClass(
            'Demo\Command\AbstractCommand',
            array('TestRunOk'),
            'TestRunOkCommand',
            true,
            true,
            true,
            array('execute')
        );

        $command
            ->expects($this->once())
            ->method('execute')
            ->will($this->returnValue(0))
        ;

        $commandTester = new CommandTester($command);
        $commandTester->execute(array());

        // Reaching this point means no error occured in initialize().
        $this->assertTrue(true);
    }
}