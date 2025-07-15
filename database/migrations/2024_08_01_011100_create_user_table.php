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
        Schema::create('user', function (Blueprint $table) {
            $table->string('user_id', 16)->primary()->nullable(false);
            $table->string('user_nama', 50)->nullable(TRUE);
            $table->string('user_alamat', 50)->nullable(TRUE);
            $table->string('user_username', 50)->nullable(TRUE);
            $table->string('user_email', 50)->nulltable(TRUE);
            $table->string('user_notlp', 13)->nullable(TRUE);
            $table->string('user_password', 50)->nullable(TRUE);
            $table->enum('user_level', ["admin", "anggota"])->nullable(TRUE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
