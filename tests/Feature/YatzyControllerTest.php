<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Controllers\YatzyController;

class YatzyControllerTest extends TestCase
{

    /**
     * Try to create the controller class.
     */
    public function testCreateControllerClass(): void
    {
        $controller = new YatzyController();
        $this->assertInstanceOf("\App\Http\Controllers\YatzyController", $controller);
    }
}
