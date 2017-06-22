<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    protected $table="report";
	protected $fillable=['id_preparat', 'id_caption', 'termin', 'all', 'prihod', 'vykor', 'result'];

	
}
