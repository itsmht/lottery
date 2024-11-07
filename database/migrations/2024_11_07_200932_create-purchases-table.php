<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('purchase_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger("scheme_id")->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('scheme_id')->references("scheme_id")->on("schemes");
            $table->integer('picked_number');
            $table->integer('bkash');
            $table->string('status');
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
};
