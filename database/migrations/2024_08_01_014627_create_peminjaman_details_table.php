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
    public function up()
    {
        Schema::create('peminjaman_details', function (Blueprint $table) {
            $table -> string('peminjaman_detail_peminjaman_id', 16) ->nullable (false);
            $table -> string('peminjaman_detail_buku_id', 16) ->nullable (false);
            //foreign
            $table->foreign('peminjaman_detail_buku_id')->references('buku_id')->on('bukus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('peminjaman_detail_peminjaman_id')->references('peminjaman_id')->on('peminjamen')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_details');
    }
};
