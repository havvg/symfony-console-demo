<?php

namespace Demo\Tests\Command;

use Symfony\Component\Console\Tester\CommandTester;
use Demo\Command\ExtendedCommand;

class ExtendedCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testExecuteWithoutInput()
    {
      $commandTester = new CommandTester(new ExtendedCommand());
      $commandTester->execute(array());

      $this->assertRegExp('/Extended Demo completed./', $commandTester->getDisplay(), '->execute() outputs something.');
    }

    public function testExecuteWithForceOption()
    {
      $commandTester = new CommandTester(new ExtendedCommand());
      $commandTester->execute(array('--force' => true));

      $this->assertRegExp('/May the force be with you/', $commandTester->getDisplay(), '->execute() outputs something more with option.');
    }
}