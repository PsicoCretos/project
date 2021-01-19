<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {
         $table->unsignedBigInteger('product_id');
         $table->unsignedBigInteger('category_id');
// essa tabela so vai reunir referencias pra encontrar as categorias do produto ou os produtos da categoria representando a ligacao na base de dados de N pra N
         $table->foreign('product_id')->references('id')->on('products');
         $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
    }
}
