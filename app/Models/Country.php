<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Country extends Model
{
    protected $table = 'countries';
    public $timestamps = true;
	  public $incrementing=false;
	  use SoftDeletes;
    protected $fillable = array('id','country_code', 'country_name','status');
}
