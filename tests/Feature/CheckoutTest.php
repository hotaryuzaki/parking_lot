<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutTest extends TestCase
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
     * CHECKOUT MENU: ENTRY VEHICLE NO
     * @test
     */
    public function it_validates_vehicle_no()
    {
        $show = $this->get('/transaction/B%203559%20SER');
        $this->assertRegexp('/Parking Bill/', $show->getContent()); // CHECK PAGE CONTENT IF PAGE IS SUCCESSFULLY ACCESS
    }
    
    /**
     * CHECKOUT MENU: ENTRY WITH EMPTY REQUIRED FIELD (tehnik dataProvider for input form)
     * @test
     * @dataProvider requiredFormValidationProvider
     */
    public function it_validates_checkout($formInput, $formInputValue)
    {
        $this->post('/transaction/out', [$formInput => $formInputValue])
            ->assertSessionHasErrors($formInput);
    }

    public function requiredFormValidationProvider()
    {
        // Submit form dengan empty value
        return [
            ['id', ''],
            ['id_slot', ''],
            ['out_date', ''],
            ['payment_type', ''],
            ['parking_bill', ''],
        ];
    }
}
