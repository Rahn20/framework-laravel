<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\GraphicalDice;

class GraphicalDiceTest extends TestCase
{

    /**
     * Test GraphicalDice class
     * properties, use no arguments.
     *
     * @return void
     */
    public function testGraphicalDiceClass(): void
    {
        $dice = new GraphicalDice();
        $this->assertInstanceOf("\App\Models\GraphicalDice", $dice);
    }

    /**
     * Test graphical funtion
     * properties, use no arguments.
     */
    public function testGraphicalDice(): void
    {
        $graphic = new GraphicalDice();

        $res = $graphic->graphic(5);
        $exp = "dice-5";
        $this->assertEquals($exp, $res);
    }
}
