<?php

use Mehrdadmahdian\MyHammer\Explorers\ExplorerBuilder;
use Mehrdadmahdian\MyHammer\Explorers\Rover;

class RoverTest extends \PHPUnit\Framework\TestCase
{
    public function testRoverBuilder()
    {
        $rover = ExplorerBuilder::build(Rover::class, "0 0 N");

        $this->assertEquals("N", $rover->getDir());
        $this->assertEquals("0", $rover->getX());
        $this->assertEquals("0", $rover->getY());
    }

    public function testMoveRover()
    {
        $rover = ExplorerBuilder::build(Rover::class, "0 0 N");
        $rover->command('M');
        $this->assertEquals(1, $rover->getY());
        $rover->command('M');
        $this->assertEquals(2, $rover->getY());

        $rover = ExplorerBuilder::build(Rover::class, "0 0 E");
        $rover->command('M');
        $this->assertEquals(1, $rover->getX());
        $rover->command('M');
        $this->assertEquals(2, $rover->getX());
    }

    public function testRotateRover()
    {
        $rover = ExplorerBuilder::build(Rover::class, "0 0 N");

        $rover->command("R");
        $this->assertEquals("E", $rover->getDir());
        $rover->command("R");
        $this->assertEquals("S", $rover->getDir());
        $rover->command("R");
        $this->assertEquals("W", $rover->getDir());
        $rover->command("R");
        $this->assertEquals("N", $rover->getDir());

        $rover->command("L");
        $this->assertEquals("W", $rover->getDir());
        $rover->command("L");
        $this->assertEquals("S", $rover->getDir());
        $rover->command("L");
        $this->assertEquals("E", $rover->getDir());
        $rover->command("L");
        $this->assertEquals("N", $rover->getDir());


    }

}