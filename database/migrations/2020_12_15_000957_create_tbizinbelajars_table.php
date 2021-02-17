<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbizinbelajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbizinbelajars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawaibk_id')->constrained('tbpegawais')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tglsurat');
            $table->double('no_surat');
            $table->string('nama_kampus');
            $table->string('kota');
            $table->string('cabang');
            $table->string('fakultas');
            $table->string('gelar');
            $table->string('program_studi');
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
        Schema::dropIfExists('tbizinbelajars');
    }
}
