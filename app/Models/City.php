<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    protected $table = 'cities';
    public $timestamps = true;
	public $incrementing=false;
	use SoftDeletes;
    protected $fillable = array('id','city_code', 'city_name','status');
}
