<?php

use Mehrdadmahdian\MyHammer\ExplorerController;
use Mehrdadmahdian\MyHammer\Explorers\ExplorerBuilder;
use Mehrdadmahdian\MyHammer\Explorers\Rover;

class ExplorerControllerTest extends \PHPUnit\Framework\TestCase
{
    public function testSeriesOfCommand()
    {
        /* first test which is specified in challenge instruction*/
        $rover = ExplorerBuilder::build(Rover::class, "1 2 N");
        $controller = new ExplorerController($rover);
        $controller->command("LMLMLMLMM");
        $this->assertEquals("1 3 N", $rover->getState());

        /* second test which is specified in challenge instruction*/
        $rover = ExplorerBuilder::build(Rover::class, "3 3 E");

        $controller = new ExplorerController($rover);
        $controller->command("MMRMMRMRRM");
        $this->assertEquals("5 1 E", $rover->getState());

        $rover = ExplorerBuilder::build(Rover::class, "0 0 N");

        $controller = new ExplorerController($rover);
        $controller->command("MMMRMMM");
        $this->assertNotEquals("3 3 N", $rover->getState());
    }

    public function testMultipleCommandOnRover()
    {
        $rover = ExplorerBuilder::build(Rover::class, "0 0 N");
        $controller = new ExplorerController($rover);

        $controller->command("MMMM");
        $this->assertEquals("0 4 N", $rover->getState());
        $controller->command("RMMMM");
        $this->assertEquals("4 4 E", $rover->getState());
        $controller->command("RMMMM");
        $this->assertEquals("4 0 S", $rover->getState());
        $controller->command("RMMMMR");
        $this->assertEquals("0 0 N", $rover->getState());




    }




}