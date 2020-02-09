<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\transaction;

class master_slot extends Model
{
	protected $fillable = [
    'slots_name',
    'slots_flag',
    'id_transaction'
  ];

  public function transaction() {
    return $this->belongsTo('App\transaction', 'id_transaction');
  }
}
