<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderMasters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordermasters', function (Blueprint $table) {
            $table->integer('orderid');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile_no');
            $table->string('email');
            $table->string('house_no');
            $table->string('street');
            $table->string('city');
            $table->string('district');
            $table->string('state');
            $table->integer('pincode');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('register');
            $table->float('ordertotalprice');            
            $table->string('orderstatus');              
            $table->string('order_date');              
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
