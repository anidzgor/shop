<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');        
            $table->string('imagePath');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->integer('amount_sell');
            $table->integer('amount');      
            $table->timestamps();
            $table->integer('id_category')->unsigned();    
            $table->integer('id_color')->unsigned();  
            $table->integer('id_size')->unsigned();  
        });

        Schema::table('products', function($table) {
            $table->foreign('id_category')->references('id')->on('categories');
            $table->foreign('id_color')->references('id')->on('colors');
            $table->foreign('id_size')->references('id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
