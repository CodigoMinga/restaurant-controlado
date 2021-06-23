<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashregisters', function (Blueprint $table) {
            $table->id();

            //usuario que abre caja
            $table->bigInteger('user_id_open')->unsigned()->nullable();
            $table->foreign('user_id_open')->references('id')->on('users');

            //usuario que cierra caja
            $table->bigInteger('user_id_close')->unsigned()->nullable();
            $table->foreign('user_id_close')->references('id')->on('users');
            
            //Compañias
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('RESTRICT')->onDelete('RESTRICT');

            //dinero inicial
            $table->decimal('ammount_open');

            //caja cerrada
            $table->dateTime('closed')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cashregisters');
    }
}
