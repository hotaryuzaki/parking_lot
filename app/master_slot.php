<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_slot extends Model
{
	protected $fillable = [
    'slots_name',
    'slots_flag',
    'id_transaction'
  ];
}
