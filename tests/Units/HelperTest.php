<?php

class HelperTest extends \PHPUnit\Framework\TestCase
{
    public function testSuccessGuessNextElementInArray()
    {
        $array = ['a','b','c','d'];

        $nextElement = guessNextElementOnArray($array, "a");
        $this->assertEquals("b", $nextElement);
        $nextElement = guessNextElementOnArray($array, "b");
        $this->assertEquals("c", $nextElement);
        $nextElement = guessNextElementOnArray($array, "c");
        $this->assertEquals("d", $nextElement);
        $nextElement = guessNextElementOnArray($array, "d");
        $this->assertEquals("a", $nextElement);
    }

    public function testFailOnGuessNextElementInArray()
    {
        $array = ['a','b','c','d'];

        $nextElement = guessNextElementOnArray($array, "e");

        $this->assertNull($nextElement);
    }
}