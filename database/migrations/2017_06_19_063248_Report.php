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
         $table->string('pidrozdil');
         $table->date('date');
         $table->integer('id_preparat');
         $table->integer('extent');
         $table->integer('all');
         $table->integer('rozhod');         
         $table->integer('prihod');
         
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
