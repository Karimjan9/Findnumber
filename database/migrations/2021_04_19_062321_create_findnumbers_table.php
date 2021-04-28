<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFindnumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('findnumbers', function (Blueprint $table) {
            $table->id();
            $table->integer('numbertofind')->default(0);
            $table->integer('tries')->default(0);
            $table->integer('try1')->default(0);
            $table->integer('try2')->default(0);
            $table->integer('try3')->default(0);
            $table->integer('try4')->default(0);
            $table->integer('try5')->default(0);
            $table->integer('try6')->default(0);
            $table->boolean('win');
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
        Schema::dropIfExists('findnumbers');
    }
}
