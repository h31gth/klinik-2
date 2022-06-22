<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('poli_id');
            $table->string('name');
            $table->string('HP');
            $table->text('alamat');
            $table->text('jk');
            $table->string('image');
            $table->timestamps();

            $table->foreign('poli_id')->references('id')->on('poliklinik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokter');
    }
}
