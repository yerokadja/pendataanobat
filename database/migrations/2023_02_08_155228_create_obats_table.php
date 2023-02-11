<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id('id_obat');
            // $table->foreignId('id_dokter');
            // $table->foreignId('id_apoteker');
            // $table->foreignId('id_pasien');
            $table->foreignId('id_pemasok');
            $table->string('nama_obat');
            $table->string('stock');
            $table->string('kategori');
            $table->string('penyimpanan');
            $table->string('kadaluarsa');
            $table->string('unit');
            $table->string('deskripsi');
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
        Schema::dropIfExists('obats');
    }
}
