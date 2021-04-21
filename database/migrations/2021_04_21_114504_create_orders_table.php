<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->uuid('uuid')->nullable();
            $table->string('identify')->unique();
            $table->integer('cliente_id')->nullable();
            $table->integer('mesa_id')->nullable();
            $table->double('total', 10,2);
            $table->enum('status', ['open', 'done', 'rejected', 'working', 'canceled', 'deliverimg']);
            $table->text('comentario')->nullable();
            $table->timestamps();
            $table->foreign('empresa_id')->references('id')
                    ->on('empresas')->onDelete('cascade');
        });

        Schema::create('orders_produto', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('produto_id');
            $table->integer('qtd')->nullable();
            $table->double('preco', 10,2);

            $table->foreign('order_id')->references('id')
                    ->on('orders')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')
                    ->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_produto');
        Schema::dropIfExists('orders');
    }
}
