<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\DiceHand;

class DiceHandTest extends TestCase
{

    /**
     * Test DiceHand class
     * properties, use one argument.
     *
     * @return void
     */
    public function testDiceHandClass()
    {
        $diceHand = new DiceHand(5);
        $this->assertInstanceOf("\App\Models\DiceHand", $diceHand);
    }

    /**
     * Test roll dices and count how many dices are in the Dicehand
     * properties, use one arguments.
     *
     * @return void
     */
    public function testCountDiceHand()
    {
        $diceHand = new DiceHand(3);
        $diceHand->rollDices();

        $res = $diceHand->values();
        $this->assertEquals(3, count($res));
    }

    /**
     * test the sum of the values
     * properties, use one argument.
     */
    public function testSumValues(): void
    {
        $diceHand = new DiceHand(3);
        $diceHand->rollDices();

        $res = $diceHand->theSum();
        $exp = array_sum($diceHand->values());
        $this->assertEquals($exp, $res);
    }

    /**
     * test get the values of the last roll
     * properties, use one argument.
     */
    public function testGetLastRoll(): void
    {
        $diceHand = new DiceHand(4);

        $res = $diceHand->getLastRoll();
        $exp = implode(", ", $diceHand->values());
        $this->assertEquals($exp, $res);
    }

    /**
     * test yatzyvalues, doing 5 tests
     * properties, use one argument.
     */
    public function testSumAllYatzyValues(): void
    {
        $diceHandTest1 = new DiceHand(8);
        $diceHandTest2 = new DiceHand(7);
        $diceHandTest3 = new DiceHand(6);
        $diceHandTest4 = new DiceHand(5);
        $diceHandTest5 = new DiceHand(4);

        $diceHandTest1->rollDices();
        $diceHandTest2->rollDices();
        $diceHandTest3->rollDices();
        $diceHandTest4->rollDices();
        $diceHandTest5->rollDices();

        $diceHandTest1->getAllValues();
        $diceHandTest2->getAllValues();
        $diceHandTest3->getAllValues();
        $diceHandTest4->getAllValues();
        $diceHandTest5->getAllValues();

        $res1 = array_sum($diceHandTest1->yatzyvalues());
        $exp1 = array_sum($diceHandTest1->values());
        $this->assertEquals($exp1, $res1);

        $res2 = $res1 + array_sum($diceHandTest2->yatzyvalues());
        $exp2 = $res1 + array_sum($diceHandTest2->values());
        $this->assertEquals($exp2, $res2);

        $res3 = $res2 + array_sum($diceHandTest3->yatzyvalues());
        $exp3 = $res2 + array_sum($diceHandTest3->values());
        $this->assertEquals($exp3, $res3);

        $res4 = $res3 + array_sum($diceHandTest4->yatzyvalues());
        $exp4 = $res3 + array_sum($diceHandTest4->values());
        $this->assertEquals($exp4, $res4);

        $res5 = $res4 + array_sum($diceHandTest5->yatzyvalues());
        $exp5 = $res4 + array_sum($diceHandTest5->values());
        $this->assertEquals($exp5, $res5);
    }


    /**
     * test result-function, doing 3 tests
     * properties, use one argument.
    */
    public function testGetAllYatzyValues(): void
    {
        $diceHandTest1 = new DiceHand(8);
        $diceHandTest2 = new DiceHand(7);
        $diceHandTest3 = new DiceHand(6);

        $diceHandTest1->rollDices();
        $diceHandTest2->rollDices();
        $diceHandTest3->rollDices();

        $diceHandTest1->getAllValues();
        $res1 = $diceHandTest1->result($diceHandTest1->values());
        $exp1 = $diceHandTest1->yatzyvalues();
        $this->assertEquals($exp1, $res1);

        $diceHandTest2->getAllValues();
        $res2 = $diceHandTest2->result($res1);
        $exp2 = $diceHandTest2->yatzyvalues();
        $this->assertEquals($exp2, $res2);

        $diceHandTest3->getAllValues();
        $res3 = $diceHandTest3->result([1, 2, 3, 4, 5, 6]);
        $exp3 = $diceHandTest3->yatzyvalues();
        $this->assertEquals($exp3, $res3);
    }
}
