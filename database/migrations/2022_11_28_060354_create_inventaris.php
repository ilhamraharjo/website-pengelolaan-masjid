<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventaris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('barang');
            $table->integer('jumlah');
            $table->date('tgl_ivt');
            $table->string('ket_ivt');
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
        Schema::dropIfExists('inventaris');
    }
}
