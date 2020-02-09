<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\transaction;

class ReportController extends Controller
{
    public function getReport(Request $request)
    {
      $request->validate([
        'report_type'=>'required',
        'parameter'=>'required'
      ]);

      $report_type = $request->input('report_type');
      $parameter = $request->input('parameter');

      if ($report_type === 'vehicle_color') {
        $transaction = transaction::where('vehicle_color', $parameter)->get();

      } else if ($report_type === 'vehicle_no') {
        $transaction = transaction::where('vehicle_no', $parameter)->get();
      }
      
      return view('report.report', compact('transaction')); 
    }
}
