<?php

namespace App\Models;

/**
 * Class DiceHand.
 */
class DiceHand
{
    private array $dices;
    private int $sum;
    private $values = [];
    private $yatzyValues = [];

    public function __construct(int $number)
    {
        for ($i = 0; $i < $number; $i++) {
            $this->dices[$i] = new Dice();
            $this->values[] = null;
        }
    }

    /**
     * roll the dices, save the values in the values object and sum the values
     * @return void
    */
    public function rollDices(): void
    {
        $this->sum = 0;
        $count = count($this->dices);

        for ($i = 0; $i < $count; $i++) {
            $this->dices[$i]->roll();
            $lastRoll = $this->dices[$i]->getLastRoll();
            $this->sum += $lastRoll;
            $this->values[$i] += $lastRoll;
        }
    }

    /**
     * roll the dices, Get last roll
     * @return string with values
    */
    public function getLastRoll(): string
    {
        return implode(", ", $this->values);
    }

    /**
     * @return int the sum
    */
    public function theSum(): int
    {
        return $this->sum;
    }

    /**
     * Get the values
     * @return array
    */
    public function values(): array
    {
        return $this->values;
    }

    /**
     * Sum the values that has the same number and  put them in array 'yatzyValues'
    */
    public function getAllValues(): void
    {
        $count = count($this->values) - 1;
        $this->yatzyValues[0] = 0;
        $this->yatzyValues[1] = 0;
        $this->yatzyValues[2] = 0;
        $this->yatzyValues[3] = 0;
        $this->yatzyValues[4] = 0;
        $this->yatzyValues[5] = 0;

        for ($i = 0; $i <= $count; $i++) {
            if ($this->values[$i] == 1) {
                $this->yatzyValues[0] += 1;
            } elseif ($this->values[$i] == 2) {
                $this->yatzyValues[1] += 2;
            } elseif ($this->values[$i] == 3) {
                $this->yatzyValues[2] += 3;
            } elseif ($this->values[$i] == 4) {
                $this->yatzyValues[3] += 4;
            } elseif ($this->values[$i] == 5) {
                $this->yatzyValues[4] += 5;
            } elseif ($this->values[$i] == 6) {
                $this->yatzyValues[5] += 6;
            }
        }
    }

    /**
     * get all the yatzy values
     * @return array
    */
    public function yatzyvalues(): array
    {
        return $this->yatzyValues;
    }


    /**
     * increase the value that has the same number and update
     * the yatzyValues array with the new value
     * @return array
    */
    public function result(array $option): array
    {
        $opt = count($option) - 1;
        $count = 0;

        while ($count <= $opt) {
            if ($option[$count] == 1) {
                $this->yatzyValues[0] += 1;
            } elseif ($option[$count] == 2) {
                $this->yatzyValues[1] += 2;
            } elseif ($option[$count] == 3) {
                $this->yatzyValues[2] += 3;
            } elseif ($option[$count] == 4) {
                $this->yatzyValues[3] += 4;
            } elseif ($option[$count] == 5) {
                $this->yatzyValues[4] += 5;
            } elseif ($option[$count] == 6) {
                $this->yatzyValues[5] += 6;
            }
            $count++;
        }
        return $this->yatzyValues;
    }
}
