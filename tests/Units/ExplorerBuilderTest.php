<?php

use Mehrdadmahdian\MyHammer\Contracts\ExplorerInterface;
use Mehrdadmahdian\MyHammer\Explorers\ExplorerBuilder;
use Mehrdadmahdian\MyHammer\Explorers\Rover;

class ExplorerBuilderTest extends \PHPUnit\Framework\TestCase
{
    public function testRoverBuilder()
    {
        $rover = ExplorerBuilder::build(Rover::class, "0 0 N");

        $this->assertInstanceOf(ExplorerInterface::class, $rover);
        $this->assertInstanceOf(Rover::class, $rover);
    }
}