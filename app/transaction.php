<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\master_slot;

class transaction extends Model
{
	protected $fillable = [
    'vehicle_no',
    'vehicle_type',
    'vehicle_brand',
    'vehicle_color',
    'entry_date',
    'out_date',
    'id_slot',
    'payment_type',
    'parking_bill'
  ];

  public function master_slot() {
    return $this->hasOne('App\master_slot', 'id_transaction');
  }
}
