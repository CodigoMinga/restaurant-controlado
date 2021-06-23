<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDtefolioToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('dte_folio')->nullable();
            $table->date('fecha_resolucion_sii')->nullable();
            $table->longText('empotency_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            
            $table->dropColumn('dte_folio');
            $table->dropColumn('fecha_resolucion_sii');
            $table->dropColumn('empotency_key');
        });
    }
}
