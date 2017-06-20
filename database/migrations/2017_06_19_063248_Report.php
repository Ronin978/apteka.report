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
         $table->string('mounth');
         $table->integer('year');
         $table->integer('id_preparat');
         $table->integer('start');
                  
         $table->integer('prihod');
         $table->integer('vykor'); 
         $table->integer('result'); 
         $table->date('termin');
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
