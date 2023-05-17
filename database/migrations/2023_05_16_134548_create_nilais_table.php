<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('nilai_x');
            $table->integer('nilai_y');
            $table->integer('nilai_z');
            $table->integer('nilai_w');
            $table->timestamps();
        });
        // Schema::table('nilais', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nilais', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('nilais');
    }
}
