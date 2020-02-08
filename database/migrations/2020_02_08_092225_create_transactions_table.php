<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('vehicle_no', 50);
            $table->string('vehicle_type', 50);
            $table->string('vehicle_brand', 50);
            $table->string('vehicle_color', 50);
            $table->dateTime('entry_date');
            $table->dateTime('out_date')->nullable();
            $table->bigInteger('id_slot');
            $table->string('payment_type', 50)->nullable();
            $table->integer('parking_bill')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
