<?php

/*
  ------------------------------------------------------------------------------------------------
  Project			: KRQ 1.0.0
  Created By    	: Loganathan N
  Created Date  	: 09.08.2017
  Purpose       	: To handle service details
  ------------------------------------------------------------------------------------------------
 */
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    protected $table = 'services';
	
    public $timestamps = true;
	public $incrementing=false;
	
	use SoftDeletes;
	
    protected $fillable = array('id','service_name', 'status');   
}
