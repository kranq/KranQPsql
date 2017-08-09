<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ServiceProviderDetails extends Model
{
    //
    protected $table = 'service_providers_details';
	public $timestamps = true;
	public $incrementing = false;
    use SoftDeletes;

	protected $fillable = array('id','service_provider_id', 'service_description', 'image');
}
