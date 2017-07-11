<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Metric extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metric', function (Blueprint $table) 
        {
         $table->increments('id');
         $table->integer('id_report');
         $table->string('type');
         $table->integer('prihod')->nullable();                 
         $table->integer('vykor')->nullable();                 
         $table->integer('result');                 
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
        Schema::drop('metric');
    }
}
