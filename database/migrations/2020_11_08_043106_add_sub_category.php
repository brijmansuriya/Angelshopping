<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_sub_category', function (Blueprint $table) {
            $table->increments('sc_id');
            $table->string('sc_name');
            $table->string('sc_desc');
            $table->integer('c_id')->unsigned();
            $table->foreign('c_id')->references('id')->on('add_category');
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
