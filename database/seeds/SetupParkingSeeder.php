<?php

use Illuminate\Database\Seeder;

class SetupParkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setup_parkings')->insert([
            'parking_name' => 'Warung Parking',
            'parking_slots' => 6,
        ]);
    }
}
