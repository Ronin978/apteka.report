<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    protected $table="preparations";
	protected $fillable=['section','date', 'id_preparat', 'all', 'rozhod', 'prihod', 'termin'];
}
