<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissaoRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permissao_id');
            $table->unsignedBigInteger('role_id');

            $table->foreign('permissao_id')->references('id')->on('permissaos');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissao_role');
    }
}
