<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * Testing index page
     */
    public function testIndexPage(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Testing Game 21 page
     */
    public function testGamePage(): void
    {
        $response = $this->get('/game');
        $response->assertStatus(200);
    }


    /**
     * Testing Yatzy page
     */
    public function testYatzyPage(): void
    {
        $response = $this->get('/yatzy');
        $response->assertStatus(200);
    }
}
