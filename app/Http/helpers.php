<?php
use App\setup_parking;

function globalSetup() {
  $option = setup_parking::find(1);
  return $option;
}