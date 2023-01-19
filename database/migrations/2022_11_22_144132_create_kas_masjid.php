<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasMasjid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_masjid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('tgl_kas');
            $table->string('uraian');
            $table->integer('masuk');
            $table->integer('keluar');
            $table->string('jenis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kas_masjid');
    }
}
