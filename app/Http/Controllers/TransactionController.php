<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\transaction;
use App\master_slot;

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
      $request->validate([
        'vehicle_no'=>'required',
        'vehicle_color'=>'required'
      ]);

      $slot = DB::table('master_slots')
                ->where('slots_flag', '0')
                ->orderBy('slots_name', 'asc')
                ->limit(1)
                ->get();

      if ($slot->count() > 0) {
        $transaction = new transaction([
          'vehicle_no' => $request->input('vehicle_no'),
          'vehicle_type' => $request->input('vehicle_type'),
          'vehicle_brand' => $request->input('vehicle_brand'),
          'vehicle_color' => $request->input('vehicle_color'),
          'entry_date' => date('Y-m-d H:i:s'),
          'id_slot' => $slot[0]->id
        ]);
        $transaction->save();

        $master_slot = master_slot::find($slot[0]->id);
        $master_slot->slots_flag = '1';
        $master_slot->id_transaction = $transaction->id;
        $master_slot->save();

        return redirect('/')->with('success', 'Parking saved!');
      } else {
        return redirect('/')->with('failed', 'Parking is full!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($vehicle_no)
    {
      $plat = htmlentities($vehicle_no);
      $transaction = transaction::where('vehicle_no', $plat)->whereNull('out_date')->get();
      
      return response()->json(json_encode($transaction));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $transaction = transaction::find($id);
      return view('transaction.edit', compact('transaction')); 
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
        'vehicle_no'=>'required',
        'vehicle_color'=>'required',
        'id_slot'=>'required'
      ]);

      $transaction = transaction::find($id);
      $transaction->vehicle_no =  $request->input('vehicle_no');
      $transaction->vehicle_type = $request->input('vehicle_type');
      $transaction->vehicle_brand = $request->input('vehicle_brand');
      $transaction->vehicle_color = $request->input('vehicle_color');
      $transaction->id_slot = $request->input('id_slot');
      $transaction->payment_type = $request->input('payment_type');
      $transaction->parking_bill = $request->input('parking_bill');
      $transaction->save();

      return redirect('/transaction')->with('success', 'Transaction updated!');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
      $request->validate([
        'id'=>'required',
        'id_slot'=>'required',
        'out_date'=>'required',
        'payment_type'=>'required',
        'parking_bill'=>'required'
      ]);

      $transaction = transaction::find($request->input('id'));
      $transaction->id_slot =  $request->input('id_slot');
      $transaction->out_date =  $request->input('out_date');
      $transaction->payment_type = $request->input('payment_type');
      $transaction->parking_bill = $request->input('parking_bill');
      $transaction->save();

      $master_slot = master_slot::find($request->input('id_slot'));
      $master_slot->slots_flag = '0';
      $master_slot->save();

      return redirect('/')->with('success', 'Vehicle checkout success!');
    }
}
