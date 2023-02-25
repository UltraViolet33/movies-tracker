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
        Schema::create('movie_wish_user', function (Blueprint $table) {
            $table->bigInteger("user_id")->unsigned();
            $table->bigInteger("movie_id")->unsigned();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("movie_id")->references("id")->on("movies");
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
