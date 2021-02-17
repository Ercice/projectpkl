<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbizinpentingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbizinpentings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawaiptg_id')->constrained('tbpegawais')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tglsurat');
            $table->double('no_surat');
            $table->date('tglmulai');
            $table->date('tglakhir');
            $table->double('selama');
            $table->string('jenis_cuti');
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
        Schema::dropIfExists('tbizinpentings');
    }
}
