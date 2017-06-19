<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preparation extends Model
{
    protected $table="preparations";
	protected $fillable=['title','units'];
}
