<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = transaction::all();

        return view('transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $slot = DB::select('select * from master_slots where slots_flag = 0', [1]);

      //   return view('user.index', ['users' => $users]);

      $request->validate([
        'vehicle_no'=>'required',
        'vehicle_color'=>'required'
      ]);

      $transaction = new transaction([
        'vehicle_no' => $request->get('vehicle_no'),
        'vehicle_type' => $request->get('vehicle_type'),
        'vehicle_brand' => $request->get('vehicle_brand'),
        'vehicle_color' => $request->get('vehicle_color'),
        'entry_date' => date('Y-m-d H:i:s'),
        'id_slot' => 1
      ]);
      $transaction->save();

      return redirect('/transaction')->with('success', 'Transaction saved!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $transaction = transaction::find($id);
      $transaction->delete();

      return redirect('/transaction')->with('success', 'Transaction deleted!');
    }
}
