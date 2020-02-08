<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setup_parking extends Model
{
	protected $fillable = [
    'parking_name',
    'parking_slots'
  ];
}
