<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptiondetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptiondetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->decimal('quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptiondetails');
    }
}
