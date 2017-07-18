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
         $table->integer('id_caption');
         $table->integer('id_preparat');
         $table->string('type');
         $table->integer('in')->nullable();                 
         $table->integer('out')->nullable();                 
         $table->integer('res');                 
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
