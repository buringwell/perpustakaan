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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table -> string('peminjaman_id', 16) -> primary ( ) ->nullable (false);
            $table -> string('peminjaman_user_id', 16) -> nullable (false);
            $table -> date('peminjaman_tglpinjam', 50) ;
            $table -> date('peminjaman_tglkembali', 50) ;
            $table -> boolean('peminjaman_statuskembali', 50) -> default(false);
            $table -> string('peminjaman_note') -> nullable (false);
            $table -> integer('peminjaman_denda') -> nullable (true);
            

            $table->foreign('peminjaman_user_id')->references('user_id')->on('user')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamen');
    }
};
