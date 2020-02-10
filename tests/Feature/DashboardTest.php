<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDashboard()
    {
        $response = $this->get('/');
        $this->assertRegexp('/Parking/', $response->getContent()); // CHECK PAGE CONTENT IF PAGE IS SUCCESSFULLY ACCESS
    }
}
