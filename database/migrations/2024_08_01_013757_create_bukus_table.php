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
        Schema::create('bukus', function (Blueprint $table) {
            $table -> string('buku_id', 16) -> primary ( ) ->nullable (false);
            $table -> string('buku_penulis_id', 16) -> nullable (false);
            $table -> string('buku_penerbit_id', 16) -> nullable (false);
            $table -> string('buku_kategori_id', 16) -> nullable (false);
            $table -> string('buku_rak_id', 16) -> nullable (false);
            $table -> string('buku_judul', 40) -> nullable (false);
            $table -> string('buku_isbn', 16) -> nullable (false);
            $table -> char('buku_thnpenerbit', 4) -> nullable (false);

            //create foreign key
            $table->foreign('buku_penulis_id')->references('penulis_id')->on('penulis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buku_penerbit_id')->references('penerbit_id')->on('penerbits')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buku_kategori_id')->references('kategori_id')->on('katrgoris')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buku_rak_id')->references('rak_id')->on('raks')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
};
