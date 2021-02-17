<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbizinsakitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbizinsakits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawaiskt_id')->constrained('tbpegawais')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tglsurat');
            $table->double('no_surat');
            $table->string('kategori');
            $table->string('jenis_sakit');
            $table->date('tglmulai');
            $table->string('tempat');
            $table->string('no_dokter')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('tbizinsakits');
    }
}
