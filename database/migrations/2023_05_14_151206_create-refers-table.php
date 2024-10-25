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
        Schema::create('refers', function (Blueprint $table) {
            $table->bigIncrements('refer_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger("refer_code_id")->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('refer_code_id')->references("refer_code_id")->on("refer_codes");
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
