<?php

/*
  ------------------------------------------------------------------------------------------------
  Project		      : KRQ 1.0.0
  Created By    	: Joan Britto S
  Created Date  	: 16.09.2017
  Purpose       	: To handle service provider images details
  ------------------------------------------------------------------------------------------------
 */

namespace App\Models;

use View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceProviderImages extends Model
{
  protected $table = 'service_provider_images';
  public $timestamps = true;
  public $incrementing = false;

  use SoftDeletes;

  protected $fillable = array('id','service_provider_id', 'image_name');

  /**
   * Get the service provider that owns the service provider images.
   */
  public function service_provider()
  {
      return $this->belongsTo('App\Models\ServiceProvider','service_provider_id');
  }

}
