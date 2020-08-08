<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plano_id');
            $table->string('cnpj', 14)->unique();
            $table->string('nome', 255)->unique();
            $table->string('url', 150)->unique();
            $table->string('email', 150)->unique();
            $table->string('logo', 150)->nullable();
            

            //Status empresa 'N' ele impedi o acesso a o sistema
            $table->enum('ativo', ['S', 'N'])->default("S");

            //
            $table->date('data_inscriacao')->nullable();
            $table->date('data_expiracao')->nullable();
            $table->string('assinatura_id', 255)->nullable();
            $table->boolean('assinatura_ativa')->default(false);
            $table->boolean('assinatura_cancelada')->default(false);
            $table->timestamps();

            $table->foreign('plano_id')->references('id')->on('planos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
