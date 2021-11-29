<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiceHand;

class YatzyController extends Controller
{
    private object $session;
    private int $select;
    private int $saveIndex;

    public function play(Request $request)
    {
        $submit = $request->input('submit');
        $this->select = (int) $request->input('select');
        $this->saveIndex = (int) $request->input('values');
        $this->session = $request->session();
        $this->setSessions();

        $number = $this->session->get('yatzy.number');

        if ($submit == "Kasta" && $number <= 2) {
            $this->roll();
        } elseif ($submit == "Behålla" && $number <= 3) {
            $this->keep();
        } elseif ($submit == "Spara" && $number <= 3) {
            $this->save();
        }

        return redirect()->route('yatzy');
    }

    private function setSessions(): void
    {
        if ($this->session->missing('yatzy')) {
            $this->session->push('yatzy', null);
            $this->session->put('yatzy.number', 0);
            $this->session->put('yatzy.values', null);
        }
    }

    private function roll(): void
    {
        $number = $this->session->get('yatzy.number');
        $number += 1;
        $this->session->put('yatzy.number', $number);

        $values = $this->session->get('yatzy.values');
        $keepDice = $this->session->get('yatzy.keepDice');

        if ($values == null) {
            $diceHand = new DiceHand(5);
        } else {
            $diceHand = new DiceHand(count($values));
        }

        // add values to session
        $diceHand->rollDices();
        $values = $diceHand->values();
        $this->session->put('yatzy.values', $values);

        $diceHand->getAllValues();
        $allValues = $diceHand->yatzyvalues();

        if ($number > 1 && $keepDice) {
            $getResult = $diceHand->result($keepDice);
            $this->session->put('yatzy.getResult', $getResult);
        } else {
            $this->session->put('yatzy.getResult', $allValues);
        }
    }

    private function keep()
    {
        $values = $this->session->get('yatzy.values');

        $this->session->push('yatzy.keepDice', $this->select);

        $getIndex = array_search($this->select, $values);
        unset($values[$getIndex]);
        $index = array_values($values);

        $this->session->put('yatzy.values', $index);
    }

    private function save(): void
    {
        $saveValue = $this->session->get('yatzy.getResult')[$this->saveIndex];
        $index = $this->saveIndex;
        $dices = $this->session->get('yatzy.saveDices');
        $getDice = $this->session->get("yatzy.dice_$index");

        if ($getDice == null) {
            $this->session->put("yatzy.dice_$index", $saveValue);
            $dices += 1;
            $this->session->put("yatzy.saveDices", $dices);

            // reset
            $this->session->put("yatzy.number", 0);
            $this->session->put("yatzy.values", null);
            $this->session->put("yatzy.getResult", null);
            $this->session->put("yatzy.keepDice", null);
        }

        $count = 0;
        if ($this->session->get('yatzy.saveDices') == 6) {
            for ($x = 0; $x <= 2; $x++) {
                $diceValue = $this->session->get("yatzy.dice_$x");
                $count += $diceValue;
            }

            $this->session->put("yatzy.sum", $count);

            if ($this->session->get("yatzy.sum") >= 63) {
                $this->session->put("yatzy.bonus", 50);
            } else {
                $this->session->put("yatzy.bonus", 0);
            }
        }
    }

    public function destroyYatzy(Request $request)
    {
        $request->session()->forget('yatzy');
        return redirect()->route('yatzy');
    }
}
