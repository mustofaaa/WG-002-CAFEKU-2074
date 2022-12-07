<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Menu;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_view_beranda()
    {
        // $data = Menu::all();
        $response = $this->get('beranda');

        $response->assertStatus(200);
    }
}
