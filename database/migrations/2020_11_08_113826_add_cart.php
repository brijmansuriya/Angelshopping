<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('c_id');
            $table->longText('cartItem');
            $table->longText('cartsitemqty');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('register');
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
