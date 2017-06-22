<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Report extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) 
        {
         $table->increments('id');        
         $table->integer('id_preparat');
         $table->integer('id_caption');
         $table->date('termin')->nullable();
         $table->integer('all');
         $table->integer('prihod');
         $table->integer('vykor'); 
         $table->integer('result'); 
         $table->timestamps();
         $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('report');
    }
}
