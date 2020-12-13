<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('p_id');
            $table->string('p_name');
            $table->integer('p_qty');
            $table->double('p_listprice');
            $table->double('p_op');
            $table->string('p_suggesion');
            $table->longText('p_desc');
            $table->mediumText('p_image');
            $table->dateTime('p_add_date');
            $table->string('p_gw');
            $table->string('p_gw_desc');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('add_brand');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('add_category');
            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('sc_id')->on('add_sub_category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
