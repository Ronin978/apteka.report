<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    protected $table="metric";
	protected $fillable=['id_caption', 'id_preparat','type', 'in', 'out', 'res'];
}
