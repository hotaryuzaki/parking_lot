<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParkingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * PARKING MENU: ENTRY WITH EMPTY REQUIRED FIELD
     * @test
     */
    public function task_entry_must_pass_validation()
    {
        // Submit form dengan empty value
        $response = $this->post('/transaction', [
         'vehicle_no'=>'',
         'vehicle_color'=>''
        ]);

        // Cek pada session apakah ada error untuk field vehicle_no dan vehicle_color
        $response->assertSessionHasErrors(['vehicle_no', 'vehicle_color']);
    }
}
