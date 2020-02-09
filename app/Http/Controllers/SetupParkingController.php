<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\setup_parking;
use App\master_slot;

class SetupParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $setup_parking = setup_parking::all();

      return view('setup_parking.index', compact('setup_parking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $setup_parking = setup_parking::find($id);
      
      return view('setup_parking.index', compact('setup_parking')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'parking_name'=>'required',
        'parking_slots'=>'required'
      ]);

      $setup_parking = setup_parking::find($id);
      $setup_parking->parking_name =  $request->input('parking_name');

      if ($setup_parking->parking_slots != $request->input('parking_slots')) {
        $setup_parking->parking_slots = $request->input('parking_slots');
        
        master_slot::truncate(); // DELETE ALL ROWS FIRST THEN INSERT NEW ROWS
        // LOOPING AS PARKING SLOTS
        for ($x = 1; $x <= $request->input('parking_slots'); $x++) {
          $master_slot = new master_slot([
            'slots_name' => $x,
            'slots_flag' => '0'
          ]);
          $master_slot->save();
        }
      }
      $setup_parking->save();

      return redirect('/')->with('success', 'Setup Parking saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
