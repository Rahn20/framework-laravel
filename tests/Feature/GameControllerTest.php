<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Controllers\GameController;

class GameControllerTest extends TestCase
{

    /**
     * Try to create the controller class.
     */
    public function testCreateControllerClass(): void
    {
        $controller = new GameController();
        $this->assertInstanceOf("\App\Http\Controllers\GameController", $controller);
    }
}
