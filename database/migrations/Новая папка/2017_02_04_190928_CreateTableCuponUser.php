<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCuponUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cart_rule_user', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            
            
            $table->integer('id_rule')->unsigned()->default(1);
            $table->foreign('id_rule')->references('id_cart_rule')->on('cart_rule');
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
