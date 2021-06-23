<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('RESTRICT')->onDelete('RESTRICT');

            $table->bigInteger('table_id')->unsigned()->nullable();
            $table->foreign('table_id')->references('id')->on('tables')->onUpdate('RESTRICT')->onDelete('RESTRICT');

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');

            $table->bigInteger('ordertype_id')->unsigned()->default(1);
            $table->foreign('ordertype_id')->references('id')->on('ordertypes')->onUpdate('RESTRICT')->onDelete('RESTRICT');

            $table->integer('credit_card')->default(0);
            $table->integer('debit_card')->default(0);
            $table->integer('efective')->default(0);
            $table->integer('transfer')->default(0);

            $table->integer('discount')->default(0);
            $table->longText('discount_description')->nullable();
            $table->integer('tip_type')->default(0);
            $table->integer('tip')->default(0);
            $table->integer('delivery')->default(0);

            $table->boolean('closed')->default(0);
            $table->boolean('enabled')->default(1);

            $table->bigInteger('internal_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
