<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caption extends Model
{
    protected $table="caption";
	protected $fillable=['section','mounth', 'year'];
}
