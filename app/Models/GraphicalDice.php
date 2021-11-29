<?php

namespace App\Models;

/**
 * Class Dice.
 */
class GraphicalDice extends Dice
{
    public function graphic(int $rollDice): string
    {
        return "dice-" . $rollDice;
    }
}
