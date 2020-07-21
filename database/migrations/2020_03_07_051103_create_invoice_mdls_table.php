<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceMdlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_mdls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orders_id')->unsigned();
            $table->string('item_name');
            $table->string('description');
            $table->string('single_amount');
            $table->string('single_paid');
            $table->string('single_due');
            $table->string('total_amount');
            $table->string('total_paid');
            $table->string('total_due');
            $table->timestamps();
            $table->foreign('orders_id')->references('id')->on('patient_mdls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_mdls');
    }
}
