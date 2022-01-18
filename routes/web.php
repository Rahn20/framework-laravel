<?php
/**
 * Web Routes
 *
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\YatzyController;
use App\Http\Controllers\HighscoreController;

// index page
Route::view('/', 'home')->name('home');

// Game21 routes
Route::view('/game', 'game')->name('game');
Route::post('/game', [ GameController::class, 'play' ])->name('play-game');
Route::get('/game/destroy', [ GameController::class, 'destroyGame' ])->name('destroy-game');

// yatzy routes
Route::view('/yatzy', 'yatzy')->name('yatzy');
Route::post('/yatzy', [ YatzyController::class, 'play' ])->name('play-yatzy');
Route::get('/yatzy/destroy', [ YatzyController::class, 'destroyYatzy' ])->name('destroy-yatzy');


//highScore for Game21
$scores = new HighscoreController();
Route::view('/highscore', 'highscore', ['scores' => $scores->getAllScores()])->name('highscore');
Route::get('/highscore/{id}', [ HighscoreController::class, 'deleteHighScoreById' ])->name('delete-one');
