<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kamar', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_kamar');
            $table->integer('jumlah_kamar');
            $table->integer('jumlah_tersedia')->default(0);
            $table->bigInteger('harga')->default(0);
            $table->enum('status', ['tersedia', 'tidak_tersedia'])->default('tersedia');
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
        Schema::dropIfExists('data_kamar');
    }
}
