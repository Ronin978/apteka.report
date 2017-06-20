<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    protected $table="report";
	protected $fillable=['mounth', 'year','id_preparat', 'start', 'prihod', 'vykor', 'result'];

	
}
