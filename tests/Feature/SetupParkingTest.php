<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SetupParkingTest extends TestCase
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
     * SETUP PARKING MENU: ENTRY WITH EMPTY REQUIRED FIELD (tehnik dataProvider for input form)
     * @test
     * @dataProvider requiredFormValidationProvider
     */
    public function it_validates_form($formInput, $formInputValue)
    {
        $this->patch('/setup-parking/1', [$formInput => $formInputValue])
            ->assertSessionHasErrors($formInput);
    }

    public function requiredFormValidationProvider()
    {
        // Submit form dengan empty value
        return [
            ['parking_name', ''],
            ['parking_slots', ''],
        ];
    }
}
