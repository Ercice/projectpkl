<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbizincutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbizincutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('tbpegawais')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tglsurat');
            $table->double('no_surat');
            $table->date('tglmulai');
            $table->date('tglakhir');
            $table->double('selama');
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
        Schema::dropIfExists('tbizincutis');
    }
}
