<?php

namespace App\Http\Controllers;

use App\Models\Highscore;
use Illuminate\Support\Facades\Schema;

class HighscoreController extends Controller
{
    private $highScoreList = [];

    public function getAllScores()
    {
        $counter = 0;

        if (Schema::hasTable('highscore')) {
            $highscore = Highscore::orderBy('score', 'DESC')->get();

            foreach ($highscore as $score) {
                $this->highScoreList[$counter] = [
                    'winner' => $score->winner,
                    'score' => $score->score,
                    'created' => $score->created,
                    'id' => $score->id
                ];

                $counter += 1;
            }
        }

        return $this->highScoreList;
    }

    public function deleteHighScoreById($id)
    {
        Highscore::where('id', $id)->delete();

        return redirect()->route('highscore');
    }
}
