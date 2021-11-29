<?php

namespace App\Models;

/**
 * Class Dice.
 */
class Dice
{
    /**
     * Save dice value
     */
    public ?int $roll = null;

    /**
     * add dice value to $roll
     * @return void
     */
    public function roll()
    {
        $this->roll = rand(1, 6);
    }

    /**
     * get dice last roll
     * @return int dice value
     */
    public function getLastRoll()
    {
        return $this->roll;
    }
}
