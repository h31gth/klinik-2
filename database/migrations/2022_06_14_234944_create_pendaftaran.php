<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('jadwal_dokter_id');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->date('tgl_pendaftaran');
            $table->integer('no_antrian');
            $table->string('status');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('pasien')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jadwal_dokter_id')->references('id')->on('jadwal_dokters')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
}
