<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_slots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('slots_name', 100);
            $table->enum('slots_flag', ['0', '1']);
            $table->bigInteger('id_transaction')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_slots');
    }
}
