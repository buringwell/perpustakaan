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
        Schema::create('penulis', function (Blueprint $table) {
            $table -> string('penulis_id', 16) -> primary ( ) ->nullable (false);
            $table -> string('penulis_nama', 50) -> nullable (false);
            $table -> string('penulis_tmplahir', 15) -> nullable (false);
            $table -> string('user_username', 50) -> nullable (false);
            $table -> date('penulis_tgllahir') -> nullable (false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penulis');
    }
};
