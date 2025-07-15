<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   // Di dalam file migrasi:
       public function up()
{
    Schema::table('ratings', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable()->after('pemesanan_id');
    });

    // OPTIONAL: Set nilai default sementara user_id ke user dengan id 1 (jika ada)
    DB::table('ratings')->whereNull('user_id')->update(['user_id' => 1]);

    Schema::table('ratings', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {
            //
        });
    }
};
